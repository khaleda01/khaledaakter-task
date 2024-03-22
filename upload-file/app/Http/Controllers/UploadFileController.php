<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function uploadFile(Request $request){
        $request ->validate([
            'file' => 'required|mimes:png,jpg,mp4'
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('upload', $filename, 'public');

        return response()->json([
            'message' => 'file uploaded successfully',
            'filename' => $filename
        ]);

    }
}
