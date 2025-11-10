<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::where('status', 'active')->get();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $page = Page::where('id', $id)->first();
        return view('admin.pages.template.' . $page->blade_name, compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            // 1️⃣ Update main page fields
            $page = Page::findOrFail($id);
            $page->update([
                'slug' => $request->slug,
            ]);

            // 2️⃣ Handle dynamic content fields (key-value)
            $keyValues = $request->except(['_token', '_method', 'slug']);

            foreach ($keyValues as $key => $value) {
                if ($key && $value !== null) {
                    PageContent::updateOrCreate(
                        [
                            'page_id' => $page->id,
                            'key' => $key
                        ],
                        [
                            'value' => $value
                        ]
                    );
                }
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Page updated successfully.',
                'url' => route('admin.pages.edit', $page->id),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
