<?php
use App\Http\Controllers\SongsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('songs', SongsController::class);
Route::resource('favorites', FavController::class);
Route::post('/subirSong', [SongsController::class,'subir'])->name("subirSong");
Route::get('/subirSongs', [SongsController::class,'subirSongs'])->name("subirSongs");
Route::get('/subirFav', [FavController::class,'subirFav'])->name("subirFav");