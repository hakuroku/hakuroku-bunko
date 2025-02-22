<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\getTopViewController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopUpdateController;
use App\Models\Series;

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

Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/delete/top-link', [SeriesController::class, 'deleteLink']);
Route::post('/change/top-link', [SeriesController::class, 'changeLink']);
Route::post('/add/top-link', [SeriesController::class, 'addLink']);
Route::post('/create/series', [SeriesController::class, 'create'])->middleware('cors');
Route::post('/upload', [EpisodeController::class, 'upload'])->middleware('cors');

Route::get('/get/add/top-links', [SeriesController::class, 'getAddTopLinks']);
Route::get('/get/change/top-links', [SeriesController::class, 'getChangeTopLinks']);
Route::get('/get/delete/top-links',[SeriesController::class, 'getDeleteTopLinks']);
Route::get('/episode/{directory}', [EpisodeController::class, 'getEpisodeContent']);
Route::get('/get/episode', [EpisodeController::class, 'getEpisodeList']);
Route::get('/get/upload-series', [SeriesController::class, 'getUploadSeriesSelectItems']);
Route::get('/get/seriesList', [SeriesController::class, 'getSeriesList']);
Route::get('/get/top-info', [getTopViewController::class, 'get']);

Route::get('/books', [BookController::class, 'index']);