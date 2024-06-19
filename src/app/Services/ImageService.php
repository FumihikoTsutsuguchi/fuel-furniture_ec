<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use InterventionImage;

class ImageService
{
    public static function upload($imageFile, $folderName)
    {

        if (is_array($imageFile)) {
            $file = $imageFile['image'];
        } else {
            $file = $imageFile;
        }
        $fileName = uniqid(rand().'_');
        $extension = $file->extension();
        $fileNameToStore = $fileName. '.' . $extension;
        $resizedImage = InterventionImage::make($file)->encode();
        Storage::disk('s3')->put( $folderName . '/' . $fileNameToStore, $resizedImage );

        return $fileNameToStore;
    }
}
