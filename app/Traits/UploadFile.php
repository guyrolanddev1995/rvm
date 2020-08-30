<?php

namespace App\Traits;

trait UploadFile {
    
    public function uploadOne($file, $directory, $disk="public")
    {
        $name = basename($file->storePublicly($directory, ['disk' => $disk]));
        return $name;
    }

    public function uploadMultiple(array $files, $directory, $disk="public")
    {
        foreach($files as $file)
        {
            basename($file, $directory, ['disk' => $disk]);
        }
    }
}