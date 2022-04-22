<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function login(){
        return view('login');
    }

    public function loging(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(!auth()->attempt($request->only('email','password'),$request->remember_me)){
            return back()->with('status','Invalid login credentials');
        }
        if(auth()->user()->is_admin == false){
            return redirect('/');
        }else{
            return redirect('/dashboard');
        }
    }


}
