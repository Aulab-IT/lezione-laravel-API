<?php

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/anime/genres', function(){
    $genres = Http::get('https://api.jikan.moe/v4/genres/anime')->json();

    return response($genres['data']);
});

Route::get('/anime/genres/{genre_id}/{genre_name?}/page/{page}', function($genre_id, $genre_name, $page){
    $animes = Http::get('https://api.jikan.moe/v4/anime', [
        'genres' => $genre_id,
        'page' => $page
    ])->json();

    $animeList = Arr::map($animes['data'], function($anime){
        return [
            'id' => $anime['mal_id'],
            'image' => $anime['images']['webp']['large_image_url'],
            'title' => $anime['title'],
            'title_english' => $anime['title_english'],
            'synopsis' => $anime['synopsis'],
        ];
    });

    return response([$animeList, $genre_name, $genre_id, $page, $animes['pagination']]);
});