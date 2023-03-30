<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{

    public function index(){
        return view("songs.login");
    }

    public function login(Request $request)
    {
        $credentials =[
            'email' => $request->email,
            'password' => $request->password,
        ];

        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();
            return redirect()->route('songs.index')->with('success', 'Bienvenido :D!!!');
        } else {
            //return redirect()->back()->with('message', 'IT WORKS!');
            //return redirect('/login');
            return redirect()->route('login')->with('error', 'Datos Erroneos :(');
        }

    }

    public function register(Request $request){
        $obj = new User();
        $obj->name= $request->name;
        $obj->l_name= $request->l_name;
        $obj->img= "user.webp";
        $obj->email= $request->mail;
        $obj->password= Hash::make($request->password);
        $obj->save();
        return redirect("/login");
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/login");
    }
}