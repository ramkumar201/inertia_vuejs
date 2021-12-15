<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Post;

trait verifyStoreImage {

    public function verifyStoreImage($request) {

        // post save
        Post::create($request);


    }

}


 // $fileName = $image->getClientOriginalName();
        // $image->storeAs('image',$fileName,'public');
        // Post::create([
        //     'title' => $title,
        //     'body' => $body,
        //     'image' => $fileName,
        //     ]);
