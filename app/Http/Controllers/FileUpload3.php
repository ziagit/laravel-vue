<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUpload3 extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $path = 'public/files/' . $fileName;
            Storage::disk('local')->put($path, file_get_contents($file));
            return response()->json("Uploaded successfully.");
        }
        return response()->json("File not found");
    }
    public function remove(Request $request)
    {
        $file = "public/files/" . $request->name;
        Storage::delete($file);
        return response()->json("Deleted successfully.");
    }
}
