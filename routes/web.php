<?php
use App\Http\Controllers\SongsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavController;
use App\Http\Controllers\ListsController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('songs', SongsController::class);
Route::resource('favorites', FavController::class);
Route::post('/subirSong', [SongsController::class,'subir'])->name("subirSong");
Route::get('/subirSongs', [SongsController::class,'subirSongs'])->name("subirSongs");
Route::get('/subirFav', [FavController::class,'subirFav'])->name("subirFav");
Route::get('/subirFavf', [FavController::class,'subirFavf'])->name("subirFavf");
Route::resource('listas', ListsController::class);
Route::get('/createList', [ListsController::class,'createList'])->name("createList");
Route::post('/subirList', [ListsController::class,'subirList'])->name("subirList");