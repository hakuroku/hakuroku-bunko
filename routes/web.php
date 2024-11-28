<?php

use App\Http\Controllers\ComicUploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeriesController;
use App\Models\Comic;
use App\Models\Series;
use Illuminate\Support\Facades\Route;

Route::post('post', [SeriesController::class, 'create'])->name('series.create');
Route::post('post', [ComicUploadController::class, 'upload'])->name('comics.upload');

Route::get('/comics/upload', [ComicUploadController::class, 'view'])->name('comics.upload_view');

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
