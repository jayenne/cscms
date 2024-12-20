<?php

namespace App\Listeners;

use UniSharp\LaravelFilemanager\Events\ImageIsUploading;
use Illuminate\Support\Facades\Auth;

class IsUploadingImageListener
{
    /**
     * Handle the event.
     *
     * @param  ImageIsUploading  $event
     * @return void
     */
    public function handle(ImageIsUploading $event)
    {
        if (!Auth::guard('web')->check()) {
            die('<p>You need to be logged in in order to upload files.</p>');
        }
    }
}
