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
// Route::get('filemanager', [DashboardController::class, 'filemaneger']);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Route::get('/', [FileManagerController::class, 'index'])->name('file-manager.index');
});


Route::prefix('admin')->as('admin.')->group(function () {

    Route::resources([
        'banners' => BannerController::class,
    ]);
});
