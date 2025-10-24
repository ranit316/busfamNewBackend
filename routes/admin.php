<?php

use Alexusmai\LaravelFileManager\Controllers\FileManagerController;
use Alexusmai\LaravelFileManager\FileManager;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return 'admin dashboard';
// })->name('dashboard');
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('images', [DashboardController::class, 'media'])->name('media');
    Route::post('upload/media', [DashboardController::class, 'uploadMedia'])->name('upload.media');

    Route::resources([
        'banners' => BannerController::class,
    ]);
});
