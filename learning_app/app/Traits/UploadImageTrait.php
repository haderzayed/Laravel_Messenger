<?php

namespace App\Traits;



use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait UploadImageTrait {


    function uploadImage($image, $directory, $quality,  $width = false, $height = false): string
    {
        // making a name to the image
        $file_extension = $image->getClientOriginalExtension();
        $file_name = Str::random(20) . '.' . $file_extension;

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $image_resize = Image::make($image->getRealPath());
        if ($width == true OR $height == true) {
            $image_resize->resize($width, $height);
        }
        $image_resize->save( $directory . '/' . $file_name, $quality);
        return  $directory . '/'. $file_name;
    }

  /*  function uploadImage($photo,$folder){

        //save photo in folder
        $file_extension = $photo -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $photo -> move($path,$file_name);

        return $file_name;
    }*/


}

// i use Intervention Image  package => for minimize size of image
