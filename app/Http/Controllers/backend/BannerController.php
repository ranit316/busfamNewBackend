<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::with('getImage')->orderBy('sort', 'asc')->where('status', 'active')->get();
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'image' => 'required|exists:media,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();

        try {

            // Determine position
            $selectedOrder = $request->sort;
            $bannerCount = Banner::count();

            // If no order provided, place at end
            if (!$selectedOrder || $selectedOrder > $bannerCount + 1) {
                $selectedOrder = $bannerCount + 1;
            }

            // Shift down existing banners at or after this position
            Banner::where('sort', '>=', $selectedOrder)
                ->increment('sort');

            // Prepare banner data
            $data = [
                'media_id' => $request->image,
                'text' => $request->text,
                'status' => $request->status,
                'sort' => $selectedOrder,
            ];

            // Create banner
            $banner = Banner::create($data);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Banner successfully added',
                'url' => route('admin.banners.index')
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving the banner',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
