<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function banner_list(){
        $banners = Banner::latest()->get();
        return view('admin.banner.banner_list',compact('banners'));
    }

    public function banner_create(){
        return view('admin.banner.banner_create');
    }

    public function banner_store(Request $request){
        $request->validate([
            'b_image' => 'required',
        ]);

        if($request->hasFile('b_image')){
            $image = $request->file('b_image');
            $file_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/banner'),$file_name);
        };

        Banner::create([
            'b_image' => $file_name,
        ]);

        return redirect()->route('banner.list')->with('success', 'Banner has been Created!');
    }

    public function banner_edit($id){
        $banner = Banner::find($id);
        return view('admin.banner.banner_edit',compact('banner'));
    }

    public function banner_update(Request $request,$id){
        $request->validate([
            'b_image' => 'required',
        ]);

        $banner = Banner::find($id);
        if($request->hasFile('b_image')){

            if($banner->b_image && file_exists(public_path('uploads/banner/'.$banner->b_image))){
                unlink(public_path('uploads/banner/'.$banner->b_image));
            }

            $image = $request->file('b_image');
            $file_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/banner'),$file_name);

        }

        $banner->update([
            'b_image' => $file_name,
        ]);
        return redirect()->route('banner.list')->with('update', 'Banner has been Updated!');

    }

    public function banner_delete($id){
        $banner = Banner::find($id);

        if($banner->b_image && file_exists(public_path('uploads/banner/'.$banner->b_image))){
                unlink(public_path('uploads/banner/'.$banner->b_image));
        }
        $banner->delete();
        return back()->with('delete', 'Banner Deleted!');
    }
}
