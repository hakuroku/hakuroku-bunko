<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\getTopViewController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TopUpdateController;


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

Route::post('/update/add-icon', [TopUpdateController::class, 'addIcon']);
Route::post('/series-create', [SeriesController::class, 'create'])->middleware('cors');
Route::post('/upload', [EpisodeController::class, 'upload'])->middleware('cors');

Route::get('/get-top-icons',[SeriesController::class, 'getDashBoardIcons']);
Route::get('/get-top-info', [getTopViewController::class, 'get']);
Route::get('/episode/{directory}', [EpisodeController::class, 'getEpisodeContent']);
Route::get('/get-series', [SeriesController::class, 'getPostSelectSeriesItems']);
Route::get('/get-episodes', [EpisodeController::class, 'getEpisodeContent']);

Route::get('/books', [BookController::class, 'index']);


