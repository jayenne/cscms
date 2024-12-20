<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Response;

class UserImagesController extends Controller
{
    private $filepath;

    public function __construct()
    {
        //
    }

    /**
     * Display all of the images.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$images = Upload::all();
        //return view('uploaded-images', compact('photos'));
    }

    /**
     * Show the form for creating uploading new images.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Saving images uploaded through XHR Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->filepath_images = public_path('storage/profiles/avatars/'.$request->user_id);
        $this->filepath_thumbs = $this->filepath_images.'/thumbs';

        $images = $request->file('file');
        $user = User::find($request->user_id);

        if (! is_array($images)) {
            $images = [$images];
        }
        if (! is_dir($this->filepath_images)) {
            mkdir($this->filepath_images, 0777);
        }

        if (! is_dir($this->filepath_thumbs)) {
            mkdir($this->filepath_thumbs, 0777);
        }

        for ($i = 0; $i < count($images); $i++) {
            $image = $images[$i];

            $name = $request->user_id.'.'.$image->getClientOriginalExtension();

            Image::make($image)
                ->resize(250, null, function ($constraints) {
                    $constraints->aspectRatio();
                })
                ->save($this->filepath_thumbs.'/'.$name);

            $image->move($this->filepath_images, $name);

            $user->profile->update(
                [
                    'avatar' => $name,
                ]
            );
        }

        return Response::json([
            'message' => 'Image saved Successfully.',
            'filename' => $name,
            'user_id' => $request->user_id,
        ], 200);
    }

    /**
     * Remove the images from the storage.
     */
    public function destroy(Request $request)
    {
        $filename = $request->id;
        $uploaded_image = Upload::where('original_name', basename($filename))->first();

        if (empty($uploaded_image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }

        $file_path = $this->filepath.'/'.$uploaded_image->filename;
        $resized_file = $this->filepath.'/'.$uploaded_image->resized_name;

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        if (file_exists($resized_file)) {
            unlink($resized_file);
        }

        if (! empty($uploaded_image)) {
            $uploaded_image->delete();
        }

        return Response::json(['message' => 'File successfully delete'], 200);
    }
}
