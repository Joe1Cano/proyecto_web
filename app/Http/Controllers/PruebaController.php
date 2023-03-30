<?php

namespace App\Http\Controllers;

use App\Models\Lists;

use App\Models\Songs;

use Illuminate\Http\Request;
use App\Models\prueba;

class PruebaController extends Controller
{
public function index()
{
    return view("songs.template", ['songs'=> prueba::get()]);
}
public function subirprueba(Request $request)
{
    $obj = new prueba();
    $obj->nombre = $request->name;
    $obj->autor = $request->autor;
    $obj->archivo_au = $request->file;
    $obj->foto = $request->img;
    $obj->save();
    return redirect()->route('songs.index')->with('guardar', 'Canción agregada correcta');
}
}