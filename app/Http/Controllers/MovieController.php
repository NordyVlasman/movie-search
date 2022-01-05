<?php

namespace App\Http\Controllers;

use App\Services\TheMovieDB\TheMovieDB;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function show($id)
    {
        $movie = app(TheMovieDB::class)->findMovie($id);
        return view('movie.show', compact('movie'));
    }
}
