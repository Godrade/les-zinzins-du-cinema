<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\MovieController::class, 'index'])->name('movies.index');
Route::post('/add', [\App\Http\Controllers\MovieController::class, 'store'])->name('movies.store');

Route::get('/search', [\App\Http\Controllers\SearchMovieController::class, 'index'])->name('search.index');
Route::get('/search/{tmdbID}', [\App\Http\Controllers\SearchMovieController::class, 'show'])->name('search.show');





Route::get('/listings', [\App\Http\Controllers\ListingController::class, 'index'])->name('listings.index');
Route::post('/listings', [\App\Http\Controllers\ListingController::class, 'store'])->name('listings.store');
