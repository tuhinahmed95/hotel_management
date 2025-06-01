<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeContorller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'home_page'])->name('home');
Route::get('/about', [FrontendController::class,'about'])->name('about');
Route::get('/blog', [FrontendController::class,'blog'])->name('bolg');
Route::get('/gallery', [FrontendController::class,'gallery'])->name('gallery');
Route::get('/room', [FrontendController::class,'room'])->name('room');
Route::get('/contact', [FrontendController::class,'contact'])->name('contact');

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

// Baner
Route::get('/banner/list', [BannerController::class,'banner_list'])->name('banner.list');
Route::get('/banner/create', [BannerController::class,'banner_create'])->name('banner.create');
Route::post('/banner/store', [BannerController::class,'banner_store'])->name('banner.store');
Route::get('/banner/edit/{id}', [BannerController::class,'banner_edit'])->name('banner.edit');
Route::post('/banner/update/{id}', [BannerController::class,'banner_update'])->name('banner.update');
Route::get('/banner/delete/{id}', [BannerController::class,'banner_delete'])->name('banner.delete');

// About
Route::get('/about/list', [AboutController::class,'about_list'])->name('about.list');
Route::get('/about/creat', [AboutController::class,'about_create'])->name('about.create');
Route::post('/about/store', [AboutController::class,'about_store'])->name('about.store');
Route::get('/about/edit', [AboutController::class,'about_edit'])->name('about.edit');

