<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class uploadImageController extends Controller
{
    use UploadImageTrait,ResponseTrait;

    public function saveImage(Request $request){

        $image=$this->uploadImage($request->file('image'),$request->input('directory'),50);

        return $this->returnData('تم رفع الصوره بنجاح',
            ['img_url'=>$image],
            201);
    }
}
