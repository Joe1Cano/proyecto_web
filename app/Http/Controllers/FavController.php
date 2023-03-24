<?php

namespace App\Http\Controllers;

use App\Models\Fav;
use Illuminate\Http\Request;
use App\Models\Songs;

class FavController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("songs.fav", ['songs'=> Fav::get()]);
    }

    public function subirFav(Request $request){
        $obj = new Fav();
        $obj-> nombre = $request->name;
        $obj-> autor = $request->autor;
        $obj->archivo_au = $request->file;
        $obj->foto = $request->img;
        $obj->save();
        return view("songs.index", ['songs'=> Songs::get()]);
    }

    public function subirFavf(Request $request){
        $obj = new Fav();
        $obj-> nombre = $request->name_f;
        $obj-> autor = $request->autor_f;
        $obj->archivo_au = $request->file_f;
        $obj->foto = $request->img_f;
        $obj->save();
        return view("songs.index", ['songs'=> Songs::get()]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Fav $fav)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fav $fav)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fav $fav)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fav $fav)
    {
        //
    }
}
