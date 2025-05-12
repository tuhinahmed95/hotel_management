<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeContorller extends Controller
{
    public function dashboard(){
        return view('layouts.admin');
    }
}
