<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MangaController extends Controller
{
    public function genres()
    {
        $genres = Http::get('https://api.jikan.moe/v4/genres/manga', [
            'explicit_genres' => false
        ])->json()['data'];

        return view('manga.genres', [
            'genres' => $genres,
        ]);
    }

    public function index($genre_id, $genre_name = null, $page)
    {
        // query strings
        $mangas = Http::get('https://api.jikan.moe/v4/manga', [
            'genres' => $genre_id,
            'page' => $page
        ])->json();

        $mangaList = Arr::map($mangas['data'], function($manga){
            return [
                'id' => $manga['mal_id'],
                'image' => $manga['images']['webp']['large_image_url'],
                'title' => $manga['title'],
                'title_english' => $manga['title_english'],
                'synopsis' => $manga['synopsis'],
                'year' => $manga['published']['string']
            ];
        });

        return view('manga.index', [
            'mangas' => $mangaList,
            'genre_name' => $genre_name,
            'genre_id' => $genre_id,
            'page' => $page,
            'pagination' => $mangas['pagination']
        ]);
    }
}
