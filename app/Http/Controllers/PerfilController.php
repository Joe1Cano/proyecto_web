<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PerfilController extends Controller
{
    public function index(){
        return view("songs.perfil");
    }


    public function update(Request $request, string $id){
            $user = User::find($id);

            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $hashName = $image->hashName();

                $image->store('public');

                $user->img = $hashName;
            }

            $user->name = $request->input('name');
            $user->l_name = $request->input('l_name');
            if($request->password!=null){
                $validatedData = $request->validate([
                    'password' => ['required', 'string', 'confirmed'],
                ]);
            
                $user->password = Hash::make($validatedData['password']);
                $user->save();
            
                return redirect()->back()->with('success', 'Password updated successfully.');
            }
            $user->email = $request->input('mail');
            $user->save();

            return redirect()->back()->with('success', 'User updated successfully.');
        }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    /*public function actualizarU(Request $request, string $id){
        $obj = User::find($id);
        $obj->name = $request->name;
        $obj->l_name = $request->l_name;
        if($request->password->isNotEmpty()){
            $obj->password = $request->password;
        }
        $obj->img = $request->img;
        $obj->email = $request->email;
        $obj->save();
        return view("songs.perfil");
    }*/
}
