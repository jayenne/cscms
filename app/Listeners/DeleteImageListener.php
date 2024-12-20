<?php

namespace App\Listeners;

use App\Models\MediaFile;
use UniSharp\LaravelFilemanager\Events\ImageIsDeleting;

class DeleteImageListener
{
    /**
     * Handle the ImageIsDeleting event.
     * If the image that is to be deleted exists inside the file_paths table,
     * block the deletion of that image and show appropriate response.
     *
     * @return void
     */
    public function handle(ImageIsDeleting $event)
    {

        $event_path = $event->path();
        $needle = 'storage';

        $path = stristr($event_path, $needle);
        $path = str_replace($needle, '', $path);

        $tmp = explode('/', $path);
        $file = array_pop($tmp);

        $tmp = explode('.', $file);
        $ext = array_pop($tmp);

        // Search for usages of the file
        MediaFile::where('path', $path)->delete();
    }
}
