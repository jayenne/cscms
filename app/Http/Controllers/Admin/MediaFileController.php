<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaFile;
use Auth;
use Illuminate\Http\Request;
use Lang;

//use App\Http\Requests\ValidateFile;

class MediaFileController extends Controller
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

        if (Auth::user()->isAdminOrEditor()) {
            $files = MediaFile::paginate(20);
        } else {

            $files = Auth::user()->files()->paginate(20);
        }

        return view('admin.files.index', ['files' => $files]);
    }

    public function popup()
    {

        return view('admin.files.filemanager');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$foo = new MediaFile( $request->only(['path']) );
        //$foo->save();

        return view('admin.files.create')->with([
            'file' => new MediaFile,
        ])->with('status', Lang::get('admin.status_message_success'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $file = Auth::user()->files()->save(new MediaFile($request->only(['path'])));

        // return "stored";
        return redirect()->route('files.index')->with('status', Lang::get('admin.store_success'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(MediaFile $mediaFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaFile $mediaFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaFile $mediaFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaFile $mediaFile)
    {
        //
    }
}
