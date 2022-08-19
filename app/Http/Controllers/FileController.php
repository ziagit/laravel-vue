<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $file->move(public_path('images'), $name);
            return response()->json("Uploaded successfully!");
        }
    }
    public function remove(Request $request)
    {
        $old_image_path = public_path('images/' . $request->name);
        if (file_exists($old_image_path)) {
            @unlink($old_image_path);
        }
        return response()->json("Removed successfully");
    }
}
