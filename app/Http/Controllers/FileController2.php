<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class FileController2 extends Controller
{
    public function upload(Request $request)
    {
        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = $file->getClientOriginalName();
                $file->move(public_path('images'), $name);
                return response()->json("File uplloaded successfully.");
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    public function remove(Request $request)
    {
        try {
            $old_image_path = public_path('images/' . $request->name);
            if (file_exists($old_image_path)) {
                @unlink($old_image_path);
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
