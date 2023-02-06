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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/show', [App\Http\Controllers\UserController::class, 'show']);
Route::post('/store', [App\Http\Controllers\UserController::class, 'store']);


Route::get('/landmark', [App\Http\Controllers\LandmarkController::class, 'show']);
Route::post('/landmark/detect', [App\Http\Controllers\LandmarkController::class, 'detect']);
