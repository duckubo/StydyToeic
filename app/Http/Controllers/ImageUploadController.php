<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra file upload
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filePath = uniqid() . '_' . $file->getClientOriginalName();

            $path = Storage::disk('s3')->put($filePath, file_get_contents($file));

            if ($path) {
                $url = Storage::disk('s3')->url($filePath);
            }
            return back()->with('success', 'Image uploaded successfully!')->with('path', $url);
        }

        return back()->withErrors(['image' => 'Please choose an image to upload.']);
    }
}
