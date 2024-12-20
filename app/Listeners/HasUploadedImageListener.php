<?php

namespace App\Listeners;

use App\Models\MediaFile;
use UniSharp\LaravelFilemanager\Events\ImageWasUploaded;

class HasUploadedImageListener
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(ImageWasUploaded $event)
    {
        $event_path = $event->path();
        $needle = 'public';

        $path = stristr($event_path, $needle);
        $path = str_replace($needle, '', $path);

        $tmp = explode('/', $path);
        $file = array_pop($tmp);

        $tmp = explode('.', $file);
        $ext = array_pop($tmp);
        $title = implode('.', $tmp);

        $icon = config('lfm.file_icon_array.'.$ext);

        MediaFile::create(['title' => $title, 'path' => $path, 'icon' => $icon]);
    }
}
