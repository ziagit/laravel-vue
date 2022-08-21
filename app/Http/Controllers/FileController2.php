<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController2 extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $path = "public/files/" . $fileName;
        Storage::disk('local')->put($path, file_get_contents($file));
        return "Uplaoded";
        // try {
        //     if ($request->hasFile('file')) {
        //         $file = $request->file('file');
        //         $name = $file->getClientOriginalName();
        //         $file->move(public_path('images'), $name);
        //         return response()->json("File uplloaded successfully.");
        //     }
        // } catch (Exception $e) {
        //     return response()->json($e->getMessage());
        // }
    }
    public function remove(Request $request)
    {
        $file = "public/files/" . $request->name;
        Storage::delete($file);
        return "Deleted";
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
