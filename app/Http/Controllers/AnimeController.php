<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{
    public function genres()
    {
        return view('anime.genres');
    }

    public function index($genre_id, $genre_name, $page)
    {
        return view('anime.index', compact('genre_id', 'genre_name', 'page'));
    }
}
