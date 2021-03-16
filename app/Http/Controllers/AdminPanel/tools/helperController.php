<?php

namespace App\Http\Controllers\AdminPanel\tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class helperController extends Controller
{
    /**
     * @param $image
     * @return string
     *  this method to upload an image in our server and rturn with full link to this image
     */
    public static function uploadImage($image)
    {
        // create new image and store it and return with full path
        $photo_url = $image;
        $photo_url_photo = Str::random(30) . '.' . $photo_url->getClientOriginalExtension();
        $photo_url->move(public_path('uploads/images'), $photo_url_photo);
        $full_path_photo_url =  '/uploads/images/' . $photo_url_photo;
        return $full_path_photo_url;
    }

    public static function deleteFile($path){
        $imgWillDelete = public_path() . $path;
        File::delete($imgWillDelete);
    }
}
