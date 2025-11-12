<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }

    public function webSettig()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $recognise = [];
        if (!empty($settings['recognise'])) {
            $recognise = json_decode($settings['recognise'], true) ?? [];
        }
        return view('admin.setting.websetting', compact('settings', 'recognise'));
    }

    public function webpageUpdate(Request $request)
    {
        // return $request->all();

        DB::beginTransaction();
        try {
            $keyValues = $request->except(['_token']);
            foreach ($keyValues as $key => $value) {
                if ($key && $value !== null) {
                    // Only JSON encode the 'recognise' key
                    $storeValue = ($key === 'recognise')
                        ? json_encode($value)
                        : $value;

                    Setting::updateOrCreate(
                        ['key' => $key],
                        ['value' => $storeValue]
                    );
                }
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Page updated successfully.',
                'url' => route('admin.setting.webSettig'),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong: ' . $e->getMessage(),
            ], 500);
        }
    }
}
