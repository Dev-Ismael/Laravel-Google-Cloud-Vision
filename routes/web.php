<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [App\Http\Controllers\HomeController::class, 'home']);

Route::get('/content', [App\Http\Controllers\ContentController::class, 'show']);
Route::post('/content/detect', [App\Http\Controllers\ContentController::class, 'detect']);

Route::get('/landmark', [App\Http\Controllers\LandmarkController::class, 'show']);
Route::post('/landmark/detect', [App\Http\Controllers\LandmarkController::class, 'detect']);

Route::get('/pdf', [App\Http\Controllers\PDFController::class, 'show']);
Route::post('/pdf/detect', [App\Http\Controllers\PDFController::class, 'detect']);
