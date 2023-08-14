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

Route::post('/add', [\App\Http\Controllers\MovieController::class, 'store'])->name('movies.store');
Route::get('/movies/{movie}', [\App\Http\Controllers\MovieController::class, 'update'])->name('movies.update');
Route::get('/movies/{movie}/delete', [\App\Http\Controllers\MovieController::class, 'destroy'])->name('movies.destroy');

Route::get('/random/{listing}', [\App\Http\Controllers\MovieRandomController::class, 'index'])->name('movies.random');

Route::get('/search', [\App\Http\Controllers\SearchMovieController::class, 'index'])->name('search.index');
Route::get('/search/{tmdbID}', [\App\Http\Controllers\SearchMovieController::class, 'show'])->name('search.show');

Route::get('/listings', [\App\Http\Controllers\ListingController::class, 'index'])->name('listings.index');
Route::post('/listings', [\App\Http\Controllers\ListingController::class, 'store'])->name('listings.store');
Route::get('/listings/{listing}', [\App\Http\Controllers\ListingController::class, 'show'])->name('listings.show');

Route::post('/movies/{movie}/vote', [\App\Http\Controllers\MovieVoteController::class, 'store'])->name('movies.vote.store');
