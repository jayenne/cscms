<?php

namespace App\Listeners;

//use App\File;
use App\Models\MediaFile;
use UniSharp\LaravelFilemanager\Events\ImageIsRenaming;

class RenameImageListener
{
    /**
     * Handle the ImageIsRenaming event.
     * If the image that is to be renamed exists inside the file_paths table,
     * rename the file path in the database to reflect the new file name.
     *
     * @param  ImageIsRenaming  $event
     * @return void
     */
    public function handle(ImageIsRenaming $event)
    {
        // Get the old and new file path from the event object
        $oldFilePath = str_replace(public_path(), "", $event->oldPath());
        $newFilePath = str_replace(public_path(), "", $event->newPath());

        // $icon = getIconClass($newFilePath);
        $icon = $event->objectPresenter()->icon;
        // Search for database records containing the old path
        // And update the record with the new file path
        MediaFile::where('path', $oldFilePath)->update(['path' => $newFilePath, 'icon' => $icon]);
    }

    public function getIconClass($filename)
    {
        $ext = explode('.', $filename);
        $ext = end($ext);
        return config('lfm.file_icon_array.' . $ext);
    }
}
