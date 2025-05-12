<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user_profile(){
        return view('admin.user.user_profile');
    }

    public function user_profile_update(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return back();
    }

    public function user_password_update(Request $request){
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user_pass = Auth::user();
        $user_pass->update([
            'password' => Hash::make($request->password),
        ]);
        return back()->with('password', 'Password Updated Sucessfully!');
    }

    public function user_photo_update(Request $request){
        $request->validate([
            'photo' => 'required',
        ]);

        $user_photo = Auth::user();
        if($request->hasFile('photo')){

            if($user_photo->photo && file_exists(public_path('uploads/user/'.$user_photo->photo))){
                unlink(public_path('uploads/user/'.$user_photo->photo));
            }

            $image = $request->file('photo');
            $file_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/user'),$file_name);

            $user_photo->update([
                'photo' => $file_name,
            ]);
        }

        return back()->with('photo', 'Photo Updated!');
    }


    // User Create
    public function user_list(){
        $users = User::where('id', '!=',Auth::id())->get();
        return view('admin.user.user_list',compact('users'));
    }

    public function user_create(){
        return view('admin.user.user_create');
    }

    public function user_store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('user.list')->with('user', 'User Created Successfully!');
    }

    public function user_delete($id){
        $user = User::find($id);
        if($user->photo && file_exists(public_path('uploads/user/'.$user->photo))){
            unlink(public_path('uploads/user/'.$user->phto));
        }
        $user->delete();
        return back()->with('delete','User Successfully Deleted!');
    }
}
