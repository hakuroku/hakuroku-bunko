<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\ComicGetController;
use App\Http\Controllers\ComicUploadController;
use App\Http\Controllers\SeriesController;
use App\Http\Middleware\CorsMiddleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/series_create', [SeriesController::class, 'create'])->middleware('cors');
Route::post('/upload', [ComicUploadController::class, 'upload'])->middleware('cors');
Route::get('/comicGet', [ComicGetController::class, 'get']);

Route::get('/books', [BookController::class, 'index']);
