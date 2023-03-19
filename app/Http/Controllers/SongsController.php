<?php

namespace App\Http\Controllers;

use App\Models\Songs;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        #return view("songs.subir");
        return view("songs.index", ['songs'=> Songs::get()]);
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
        
        #dd($file);
        echo "
        <audio controls>
            <source src='http://localhost:8080/paw233/proyect_web/storage/app/public/".$file1->hashName()."' type='audio/mpeg'>
        </audio>";
        
        echo "<img src='http://localhost:8080/paw233/proyect_web/storage/app/public/".$file2->hashName()."'/>"; 
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
