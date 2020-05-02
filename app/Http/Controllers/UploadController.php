<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class UploadController extends Controller
{
    public function uploadPage() {
        return view('admin.upload');
    }

    public function upload(Request $request) {
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = time();
            $fileName = $imageName . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image);
            $img->save(public_path('/storage/uploads/') . $fileName);
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save(public_path('/storage/uploads/thumbnails/') . $fileName);
        }

        return response()->json([
            'message' => 'Success'
        ], 200);
    }
}
