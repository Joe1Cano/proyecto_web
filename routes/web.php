<?php
use App\Http\Controllers\SongsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavController;
use App\Http\Controllers\ListsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerfilController;

Route::get('/', function () {
    return view('songs.view');
})->middleware('auth');


Route::post('/authenticate', [LoginController::class,'authenticate'])->name("authenticate");
Route::post('/validar-registro', [LoginController::class,'register'])->name("validar-registro");
Route::get('/logout', [LoginController::class,'logout'])->name("logout");
Route::post('/validar-login', [LoginController::class,'login'])->name("validar-login");
Route::view('/register', 'songs.register');
Route::view('/login', 'songs.login')->name("login");

Route::resource('songs', SongsController::class)->middleware('auth');
Route::resource('favorites', FavController::class)->middleware('auth');
Route::resource('perfil', PerfilController::class)->middleware('auth');
Route::post('/subirSong', [SongsController::class,'subir'])->name("subirSong")->middleware('auth');
Route::get('/subirSongs', [SongsController::class,'subirSongs'])->name("subirSongs")->middleware('auth');
Route::get('/subirFav', [FavController::class,'subirFav'])->name("subirFav")->middleware('auth');
Route::get('/subirFavf', [FavController::class,'subirFavf'])->name("subirFavf")->middleware('auth');
Route::resource('listas', ListsController::class)->middleware('auth');
Route::get('/createList', [ListsController::class,'createList'])->name("createList")->middleware('auth');
Route::post('/subirList', [ListsController::class,'subirList'])->name("subirList")->middleware('auth');
//Route::get('/actualizarU', [PerfilController::class,'actualizarU'])->name("actualizarU")->middleware('auth');

use App\Http\Controllers\Prueba1Controller;

Route::resource('prueba1', 'App\Http\Controllers\Prueba1Controller')->middleware('auth');
Route::get('/subirprueba1', [App\Http\Controllers\Prueba1Controller::class,'subirprueba1'])->name('subirprueba1')->middleware('auth');


use App\Http\Controllers\PruebaController;

Route::resource('prueba', 'App\Http\Controllers\PruebaController');
Route::get('/subirprueba', [App\Http\Controllers\PruebaController::class,'subirprueba'])->name('subirprueba');
