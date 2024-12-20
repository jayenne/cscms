<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404);
    }

    public function show(Request $request, Page $page)
    {
        if ($page->id === null) {
            $page = Page::where('id', 1)->where('published', true)->where('restricted', false)->firstOrFail();
        }

        if ($page->restricted == true && (Auth::check() == false || Auth::user()->hasRole('member') == false)) {
            return redirect()->route('login');
            //return abort(404);
        }

        if (\Request::segment(1) == 'preview') {
            $page->preview = true;
        }
        return view('frontend.index', compact('page'));
    }
}
