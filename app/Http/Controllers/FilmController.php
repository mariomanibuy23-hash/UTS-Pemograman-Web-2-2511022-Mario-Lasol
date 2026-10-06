<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    // Menampilkan semua daftar film (Index)
    public function index()
    {
        $films = Film::paginate(5);
        return view('films.index', compact('films'));
    }

    // Menampilkan detail satu film berdasarkan ID (Show)
    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }
}
