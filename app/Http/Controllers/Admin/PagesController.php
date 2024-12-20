<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Lang;

use App\Models\Page;
use App\Models\PageBlock;
use App\Models\PageBlockLibrary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePage;

class PagesController extends Controller
{


    public function __construct()
    {
        $this->middleware('AccessAdmin');
    }

    /**
     * Display a listing of user editable pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.pages.create')->with([
            'page' => new Page(),
            'orderedPages' => Page::defaultOrder()->get()
        ])->with('status', Lang::get('admin.status_message_success'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ValidatePage $request)
    {

        $page = Auth::user()->pages()->save(new Page($request->only([
            'title',
            'slug',
            'excerpt',
            'add_to_nav',
            'title_nav',
            'layout',
            'redirect',
            'target',
            'publish_on',
            'publish_off',
            'published',
            'status',
            'approved_id',
            'approved_on'
        ])));

        $this->updatePageOrder($page, $request);

        $msg = Lang::get('admin.status_message_success', ['1' => 'page', '2' => 'created']);

        $request->session()->flash('message', $msg);
        $request->session()->flash('message-type', 'success');

        return response()->json(['status' => $msg, 'id' => $page->id, 'view' => '/admin/pages/' . $page->id . '/edit']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {

        if (Auth::user()->cant('update', $page)) {
            return redirect()->route('pages.index');
        }

        return view('admin.pages.edit', [
            'page' => $page,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePage $request, Page $page)
    {

        // validate slug
        $request->slug = null;

        if (Auth::user()->cant('update', $page)) {
            return redirect()->route('pages.index')->with('status', Lang::get('admin.status_message_denied', ['1' => 'update', '2' => 'page']));
        }

        // set checkbox 0's
        if (!isset($request['published'])) {
            $request->merge(['published' => '0']);
        }

        if (!isset($request['add_to_nav'])) {
            $request->merge(['add_to_nav' => '0']);
        }

        if (!isset($request['status'])) {
            $request->merge(['status' => '0']);
            $request->merge(['approved_on' => null]);
            $request->merge(['approved_id' => null]);
        } else if ($request['status'] == 1 && $page->approved_on === null) {
            $request->merge(['approved_on' => date('Y-m-d H:i:s')]);
            $request->merge(['approved_id' => Auth::user()->id]);
        }


        // UPDATE PAGE ORDER
        if ($response = $this->updatePageOrder($page, $request) !== null) {
            return $response;
        }


        // SAVE PAGE TAGS
        if ($request['tags']) {
            $page->retag($request['tags']);
        } else {
            $page->detag();
        }

        // BLOCKS

        // revert block concent from approved version.
        /*
        if($request['block_revert_ids']){

            foreach($request['block_revert_ids'] as $val){

                $row = PageBlock::where( 'block_uid', '=', $val )->update([
                    'block_content_values' => \DB::raw( 'block_content_values_approved' )
                ]);

            }

        }
        */

        // delete removed blocks & remove thier attribs & values etc.
        if ($request['block_delete_ids']) {
            foreach ($request['block_delete_ids'] as $key => $val) {
                try {
                    PageBlock::where('block_uid', '=', $val)->delete();
                    unset($request['block_default_fields'][$val]);
                } catch (\Exception $e) {
                    // return $e->getMessage();
                }
            }
        }

        if ($request['block_default_fields']) {
            foreach ($request['block_default_fields'] as $key => $val) {
                $source_block = PageBlockLibrary::where(['block_lid' => $val['block_lid']])->firstOrFail();

                $block_default_values = [
                    'user_id' => Auth::user()->id,
                    'page_id' => $page->id,
                    'block_lid' => $source_block->block_lid,
                    'block_uid' => $key,
                    'block_name' => $val['block_name'] ?: $source_block->block_name,
                    'block_anchor' => isset($val['block_anchor']) ? 1 : 0,
                    'block_attribute_values' => $source_block->block_attribute_values,
                    'block_content_values' => $source_block->block_content_values,
                    'block_order' => $val['block_order'] ?: 0,
                    'block_offset' => $val['block_offset'] ?: 0,
                    'block_published' => $val['block_published'] ?: 0,
                ];

                if (isset($request['block_default_fields'][$key]['block_status']) && $request['block_default_fields'][$key]['block_status'] == 1) {
                    $block_default_values['block_approved_on'] = date('Y-m-d H:i:s');
                }

                PageBlock::updateOrCreate(['block_uid' => "$key"], $block_default_values);
            };
        }

        if ($request['block_attribute_values']) {
            foreach ($request['block_attribute_values'] as $key => $val) {
                $pageBlock = PageBlock::where('block_uid', '=', $key)->first();

                $pageBlock->block_attribute_values = json_encode($val);

                $pageBlock->save();
            }
        }


        if ($request['content']) {
            foreach ($request['content'] as $key => $val) {
                if (isset($request['block_revert_ids']) && in_array($key, $request['block_revert_ids'])) {
                    // REVERT TO PREVIOUSLY APPROVED CONTENT
                    $pageBlock = PageBlock::where('block_uid', '=', $key)->update([
                        'block_content_values' => \DB::raw('block_content_values_approved'),
                        'block_published' => 1

                    ]);
                    //$pageBlock->block_published = 1;
                    //$pageBlock->save();
                } else {
                    // UPDATE WITH NEW CONTENT
                    $pageBlock = PageBlock::where('block_uid', '=', $key)->first();

                    $pageBlock->block_content_values = json_encode($val);

                    if (isset($request['block_default_fields'][$key]['block_status']) && $request['block_default_fields'][$key]['block_status'] == 1) {
                        $pageBlock->block_published = 1;
                        $pageBlock->block_content_values_approved = json_encode($val);
                    }

                    $pageBlock->save();
                }
            }
        }

        $page->fill($request->only([
            'title',
            'slug',
            'add_to_nav',
            'published',
            'publish_on',
            'publish_off',
            'status',
            'approved_id',
            'approved_on',
            'title_nav',
            'layout',
            'redirect',
            'target',
            'excerpt',
            'nav_title'
        ]));

        $page->save();

        $msg = Lang::get('admin.status_message_success', ['1' => 'page', '2' => 'updated']);

        $request->session()->flash('message', $msg);
        $request->session()->flash('message-type', 'success');

        if (config('app.debug')) {
            return response()->json(['status' => $msg, 'page' => $page->id]);
        }

        return response()->json(['status' => $msg, 'id' => $page->id, 'view' => '/admin/pages/' . $page->id . '/edit']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Page $page)
    {

        if (Auth::user()->cant('delete', $page) || $page->id == 1) {
            //return redirect()->route('pages.index')->with(['message'=>Lang::get('admin.status_message_denied',['1' => 'delete', '2' => 'page' ]),'status'=>'danger']);
            return redirect()->route('pages.index')->with(['errors' => Lang::get('admin.status_message_denied', ['1' => 'delete', '2' => 'page']), 'status' => 'danger']);
        }

        $page->delete();
        // select all blocks and delete them too.
        PageBlock::where('page_id', $page->id)->delete();

        return redirect()->route('pages.index')->with(['message' => Lang::get('admin.status_message_success', ['1' => 'page', '2' => 'deleted']), 'status' => 'success']);
    }

    /**
     * Update the specified page order.
     *
     * @param  \App\Models\Page  $page
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function updatePageOrder(Page $page, Request $request)
    {

        if ($request->has('order_option', 'order_relation_id')) {
            // you can not set a page as it's own child.
            if ($page->id == $request->order_relation_id) {
                return redirect()->route('pages.edit', ['page' => $page->id])->withInput()->withErrors(['errors' => Lang::get('admin.pages_page_order_self_error')]);
            }

            // you can only action it if neither var are null
            if ($request->order_option !== null && $request->order_relation_id !== null) {
                $page->updateOrder($request->order_option, $request->order_relation_id);
            }
        }
    }
}
