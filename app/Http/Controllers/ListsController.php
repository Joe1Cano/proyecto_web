<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("songs.lists", ['songs'=> Lists::get()]);
    }

    public function createList(){
        return view("songs.create");
    }


    public function subirList(Request $request){
        $file = $request->file("img");
        $request->file("img")->store('public');
        $obj = new Lists();
        $obj-> nombre = $request->name;
        $obj-> id_user = 1;
        $obj-> foto = $file->hashName();
        $obj->save();
        return view("songs.lists", ['songs'=> Lists::get()]);
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
    public function show(Lists $lists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lists $lists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lists $lists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lists $lists)
    {
        //
    }
}
