<?php

namespace App\Http\Controllers;

use App\Models\Songs;
use Illuminate\Http\Request;
use App\Models\Lists;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("songs.index", ['songs'=> Songs::get(),'listas'=>Lists::get()]);
    }

    public function subirSongs(){
        return view("songs.subir");
    }

    public function subir(Request $request){
        $file1 = $request->file("song");
        $request->file("song")->store('public');
        $file2 = $request->file("img");
        $request->file("img")->store('public');
        $obj = new Songs();
        $obj-> nombre = $request->name;
        $obj-> autor = $request->autor;
        $obj->archivo_au = $file1->hashName();
        $obj->foto = $file2->hashName();
        $obj->save();
        
        return redirect()->route('songs.index')->with('saved', 'Canción creada correctamente');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Songs $songs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Songs $songs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Songs $songs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Songs $songs)
    {
        //
    }
}
