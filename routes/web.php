<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\PublicController;

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

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/manga/genres', [MangaController::class, 'genres'])->name('manga.genres');
Route::get('/manga/genres/{genre_id}/{genre_name?}/page/{page}', [MangaController::class, 'index'])->name('manga.index');

Route::get('/anime/genres', [AnimeController::class, 'genres'])->name('anime.genres');
Route::get('/anime/genres/{genre_id}/{genre_name?}/page/{page}', [AnimeController::class, 'index'])->name('anime.index');
