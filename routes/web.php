<?php

use App\Http\Controllers\BookController;

use Illuminate\Support\Facades\Route;


// Halaman utama
Route::view('/', 'home')->name('home');

// Rute Books (mencakup index, create, store, show, edit, update, destroy otomatis)
Route::resource('books', BookController::class);

// Fix untuk ExampleTest (Route home)
Route::get('/', function () {
    return view('welcome'); // Pastikan file resources/views/welcome.blade.php tersedia
})->name('home');


