<?php

namespace App\Http\Controllers;

use App\Models\Lists;

use App\Models\Songs;

use Illuminate\Http\Request;
use App\Models\prueba1;

class Prueba1Controller extends Controller
{
public function index()
{
    return view("songs.template", ['songs'=> prueba1::get()]);
}
public function subirprueba1(Request $request)
{
    $obj = new prueba1();
    $obj->nombre = $request->name;
    $obj->autor = $request->autor;
    $obj->archivo_au = $request->file;
    $obj->foto = $request->img;
    $obj->save();
    return view("songs.index", ['songs'=> Songs::get(),'listas'=>Lists::get()]);
}
}