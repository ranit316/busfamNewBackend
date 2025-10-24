<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function media()
    {
        $media = Media::where('status', 'active')->orderBy('created_at', 'desc')->get();
        return view('admin.media', compact('media'));
    }

    public function uploadMedia(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'media_file' => 'required|file|mimes:jpeg,jpg,png,webp|max:1024',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();

        try {
            // Handle file upload
            if ($request->hasFile('media_file')) {
                $file = $request->file('media_file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('image'), $fileName);

                // Save record to media table
                $media = Media::create([
                    'media_name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                    'url' => 'image/' . $fileName, // relative to public/
                    'type' => $file->getClientMimeType(),
                    'alt' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                    'status' => 'active'
                ]);

                $all_media = Media::where('status', 'active')->orderBy('created_at', 'desc')->get();
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Media uploaded successfully!',
                'media' => $all_media,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while uploading media',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
