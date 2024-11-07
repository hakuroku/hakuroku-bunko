<?php

use App\Http\Controllers\ComicCreateController;
use App\Http\Controllers\ProfileController;
use App\Models\Comic;
use Illuminate\Support\Facades\Route;

Route::post('post', [ComicCreateController::class, 'create'])->name('comics.create');
Route::get('/comics/create', [ComicCreateController::class, 'view'])->name('comics.create_view');

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
