<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function upload(ImageUploadRequest $request)
    {
        $file_name = Str::random() . '.' . $request->file('image')->extension();

        return ['url' => config('filesystems.disks.public.url') . '/' . $request->file('image')->storeAs('images/products', $file_name, 'public')];
    }
}
