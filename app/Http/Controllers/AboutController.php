<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about_list(){
        return view('admin.about.about_list');
    }

    public function about_create(){
        return view('admin.about.about_create');
    }

    public function about_store(Request $request){
        $request->validate([
            'heading' => 'required',
            'content' => 'required',
            'photo' => 'required',
        ]);

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $file_name = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/about'),$file_name);
        }

        About::create([
            'heading' => $request->heading,
            'content' => $request->content,
            'photo' => $file_name,
        ]);

        return redirect()->route('about.list')->with('success', 'Data Successfull Added!');
    }
}
