<?php

use App\Http\Controllers\HomeContorller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeContorller::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// User
Route::get('/user/profile', [UserController::class,'user_profile'])->name('user.profile');
Route::post('/user/profile/update', [UserController::class,'user_profile_update'])->name('user.profile.update');
Route::post('/user/password/update', [UserController::class,'user_password_update'])->name('user.password.update');
Route::post('/user/photo/update', [UserController::class,'user_photo_update'])->name('user.photo.update');

// User Create
Route::get('/user/list', [UserController::class,'user_list'])->name('user.list');
Route::get('/user/create', [UserController::class,'user_create'])->name('user.create');
Route::post('/user/store', [UserController::class,'user_store'])->name('user.store');
Route::get('/user/delete/{id}', [UserController::class,'user_delete'])->name('user.delete');

