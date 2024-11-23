<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function uploadToS3(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048',
        ]);

        $file = $request->file('file');
        $filePath = uniqid() . '_' . $file->getClientOriginalName();

        $path = Storage::disk('s3')->put($filePath, file_get_contents($file));

        if ($path) {
            return response()->json([
                'success' => true,
                'message' => 'File uploaded successfully.',
                'url' => Storage::disk('s3')->url($filePath)
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'File upload failed.',
            ], 500);
        }
    }
}
