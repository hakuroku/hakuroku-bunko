<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\GetComicController;
use App\Http\Controllers\ComicUploadController;
use App\Http\Controllers\GetEpisodeController;
use App\Http\Controllers\GetSeriesController;
use App\Http\Controllers\getTopViewController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TopUpdateController;
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

Route::patch('/update/addIcon', [TopUpdateController::class, 'addIcon']);
Route::post('/series_create', [SeriesController::class, 'create'])->middleware('cors');
Route::post('/upload', [ComicUploadController::class, 'upload'])->middleware('cors');

Route::get('/getIcons',[GetSeriesController::class, 'getIcons']);
Route::get('/getTopView', [getTopViewController::class, 'get']);
Route::get('/episode/{directory}', [GetEpisodeController::class, 'get']);
Route::get('/getSeries', [GetSeriesController::class, 'get']);
Route::get('/getComic', [GetComicController::class, 'get']);

Route::get('/books', [BookController::class, 'index']);


