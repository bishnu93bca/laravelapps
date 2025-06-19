<?php

namespace App\Helpers;

use App\Models\StorageFile;
use Illuminate\Support\Facades\Storage;

class FileUploadHelper
{
    /**
     * Handle file upload and save its details in the storage_files table.
     *
     * @param \Illuminate\Http\UploadedFile $file The uploaded file instance.
     * @param string $directory The directory to store the file (default: 'uploads').
     * @param string $disk The storage disk to use (default: 'public').
     * @param array|null $additionalData Additional metadata for the file (default: null).
     * @return array An array containing success status, file details, or error message.
     */
    public static function uploadFile($file, $directory = 'uploads', $disk = 'public', $additionalData = null)
    {
        try {
            // Store the file in the specified directory
            $filePath = $file->store($directory, $disk);
            $fileUrl = Storage::disk($disk)->url($filePath);
            $fileName = $file->getClientOriginalName();
            $fileSize = $file->getSize();
            $fileExtension = $file->getClientOriginalExtension();
            $fileMime = $file->getMimeType();
            $mimeParts = explode('/', $fileMime);
            $fileName = basename($filePath);
            $type='user';

            // Save file details to the database
            $fileData = [
                'storage_path' => $filePath,
                'type' => $type,
                'extension' => $fileExtension,
                'name' => $fileName,
                'mime_major' => $mimeParts[0] ?? null,
                'mime_minor' => $mimeParts[1] ?? null,
                'size' => $fileSize,
            ];

            // Merge additional data if provided
            if ($additionalData) {
                $fileData = array_merge($fileData, $additionalData);
            }
            $storageFile = StorageFile::create($fileData);
            return [
                'success' => true,
                'file_record' => $storageFile,
                'file_url' => $fileUrl,
            ];
        } catch (\Exception $e) {
            \Log::error('File upload error: ' . $e->getMessage());

            return [
                'success' => false,
                'message' => 'File upload failed!',
                'error' => $e->getMessage(),
            ];
        }
    }
}
