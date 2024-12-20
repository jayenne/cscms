<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Auth;
use UniSharp\LaravelFilemanager\Events\ImageIsUploading;

class IsUploadingImageListener
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(ImageIsUploading $event)
    {
        if (! Auth::guard('web')->check()) {
            exit('<p>You need to be logged in in order to upload files.</p>');
        }
    }
}
