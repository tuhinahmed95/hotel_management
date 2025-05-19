<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home_page(){
        return view('frontend.index');
    }

    public function about(){
        return view('frontend.about');
    }

     public function gallery(){
        return view('frontend.gallery');
    }

     public function blog(){
        return view('frontend.blog');
    }

     public function room(){
        return view('frontend.room');
    }

     public function contact(){
        return view('frontend.contact');
    }
}
