<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function uploadFile(Request $request){
        // Validate the incoming file
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Example validation rules
        ]);

        // Store the file in the 'public' directory
        $filePath = $request->file('file')->store('public');

        // Get the filename for further processing if needed
        $fileName = basename($filePath);

        return response()->json([
            'message' => 'File uploaded successfully!',
            'file_path' => $filePath,
            'file_name' => $fileName,
        ]);
    }
    
}
