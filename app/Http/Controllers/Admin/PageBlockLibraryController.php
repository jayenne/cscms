<?php

namespace App\Http\Controllers\Admin;


use App\Models\PageBlockLibrary;
use App\Models\PageBlock;
use Artisan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

// TODO: use App\Http\Requests\ValidatePageBlockLibrary;

class PageBlockLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PageBlockLibrary  $pageBlockLibrary
     * @return \Illuminate\Http\Response
     */
    public function show(PageBlockLibrary $pageBlockLibrary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PageBlockLibrary  $pageBlockLibrary
     * @return \Illuminate\Http\Response
     */
    public function edit(PageBlockLibrary $pageBlockLibrary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PageBlockLibrary  $pageBlockLibrary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PageBlockLibrary $pageBlockLibrary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PageBlockLibrary  $pageBlockLibrary
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageBlockLibrary $pageBlockLibrary)
    {
        //
    }


    /**
     * Return the given resource from a given template folder as HTML.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PageBlock  $pageBlock
     * @return \Illuminate\Http\Response
     */

    public function getBlockTemplate(Request $request)
    {

        // get template file for given block type.
        $data = PageBlockLibrary::where('block_lid', $request->block_lid)->firstOrFail();
        // create new id for block
        $data->block_uid = 'b' . uniqid();

        $returnHTML = view('admin.pages.partials.block', ['block' => $data])->render();

        return Response::json(['data' => $data, 'html' => json_encode($returnHTML)]);
    }


    private function syncFilesToLibrary()
    {

        Artisan::call('db:seed', ['--class' => 'PageBlockLibraryTableSeeder']);
        return Artisan::output();
    }


    public function syncLibraryBlocks()
    {

        $msg = 'Synchronised all blocks from file to library';

        $msg .= $this->syncFilesToLibrary();

        return Response::json(['status' => $msg]);
    }


    public function syncPageBlocks()
    {

        $msg = 'Re-based the following blocks: ';

        $this->syncFilesToLibrary();

        $blocks = PageBlockLibrary::all();

        foreach ($blocks as $block) {
            $msg .= $block->block_name . ', ';
            PageBlock::where('block_lid', $block->block_lid)->update([
                'block_attribute_values' => $block->block_attribute_values,
            ]);
        }

        return Response::json(['status' => $msg]);
    }
}
