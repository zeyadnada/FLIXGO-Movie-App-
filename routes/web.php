<?php

use App\Http\Controllers\user\ActorsController;
use App\Http\Controllers\user\MoviesController;
use App\Http\Controllers\user\TvController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('user.home');
// });

Route::resource('movies', MoviesController::class);
Route::resource('tvShows', TvController::class);
Route::resource('actors', ActorsController::class);
Route::get('/actors/page/{page}', [ActorsController::class, 'index']);