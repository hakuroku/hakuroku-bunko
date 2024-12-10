<?php

use App\Http\Controllers\GetTopViewController;
use App\Http\Controllers\ComicGetController;
use App\Http\Controllers\ComicUploadController;
use App\Http\Controllers\ProfileController;
use App\Models\Comic;
use App\Models\Series;
use Illuminate\Support\Facades\Route;

// Route::post('post', [ComicUploadController::class, 'create'])->name('series.create');
Route::get('/comics/viewer', [GetTopViewController::class, 'getImg']);
Route::post('/comics/upload', [ComicUploadController::class, 'upload']);

Route::get('/comics/upload', [ComicUploadController::class, 'view']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
