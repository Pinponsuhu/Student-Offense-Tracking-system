<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigateController extends Controller
{
    public function index(){
        return view('profile');
    }

    public function report(){
        return view('report');
    }

    public function see_student(){
        return view('student');
    }

    public function file_offense(){
        return view('file-offense');
    }
}
