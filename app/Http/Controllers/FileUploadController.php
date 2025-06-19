<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FileUploadHelper;


class FileUploadController extends Controller
{
    

    public function upload(){
        echo $url = asset('storage/demo/');
         return view('views/upload');
    }
    public function uploadFile(Request $request)
    {
        // Validate the incoming file
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf', // 2MB limit
        ]);

        try {
            $result = FileUploadHelper::uploadFile($request->file('file'),'event');
            return $result;


            // // Store the file in the 'public/uploads' directory
            // $filePath = $request->file('file')->store('uploads', 'public');

            // // Get the filename for further processing if needed
            // $fileName = basename($filePath);

            // // Generate the file URL
            // $fileUrl = asset('storage/uploads/' . $fileName);

            // return response()->json([
            //     'message' => 'File uploaded successfully!',
            //     'file_path' => $filePath,
            //     'file_name' => $fileName,
            //     'file_url' => $fileUrl,
            // ]);
        } catch (\Exception $e) {
            // Log and return the error
            \Log::error('File upload error: ' . $e->getMessage());
            return response()->json([
                'message' => 'File upload failed!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
