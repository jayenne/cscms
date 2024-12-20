<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Lang;

use App\Models\PageBlock;
use App\Models\PageBlockLibrary;
use App\Models\Page;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePageBlock;

class PageBlockController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

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
        return view('admin.pages.create')->with([
            'pageblock' => new PageBlock(),
        ])->with('status', Lang::get('admin.status_message_success'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatePageBlock $request)
    {
        //
        // $pageBlock = Auth::user()->page()->save(new PageBlock());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PageBlock  $pageBlock
     * @return \Illuminate\Http\Response
     */
    public function show(PageBlock $pageBlock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PageBlock  $pageBlock
     * @return \Illuminate\Http\Response
     */
    public function edit(PageBlock $pageBlock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PageBlock  $pageBlock
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePageBlock $request, PageBlock $pageBlock)
    {
        //

        $pageBlock->fill($request->only(
            [
                //'block_uid',
                'block_lid',
                'block_name',
                'block_anchor',
                'block_attribute_values',
                'block_content_values',
                'block_order',
                'block_offset',
                'block_approved_on'
            ]
        ));

        $pageBlock->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PageBlock  $pageBlock
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageBlock $pageBlock)
    {
        //
    }
}
