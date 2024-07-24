<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Models\Profile;

Route::get('/', function () {
    return view('home');
});

        Route::get('/Login',[LoginController::class, 'index'])->middleware('guest');
        Route::post('/Login',[LoginController::class, 'authenticate']);
        Route::post('/logout',[LoginController::class, 'logout']);



Route::resource('/Register', RegisterController::class);
Route::resource('/Main', PostController::class)->middleware('auth');

Route::post('/profil',[ProfilController::class,'authenticate'])->middleware('auth');
Route::get('/profil', function () {
    return view ('profil' , [
        "title" => "My Profil",

    ]);
});

Route::get('/Admin',[AdminController::class, 'index'])->middleware('role');

// Route::get('add-media-to-library',function(){
// Profile::create()
// ->addMedia(storage_path('public/profil-images/avatar.jpg'))
// ->toMediaCollection();
// });

// Route::get('add-media-from-request',[ProfileController::class,'create']);
// Route::post('add-media-from-request',[ProfileController::class,'store']);
Route::get('/avatar',[ProfileController::class,'create']);
Route::get('/avatar',[ProfileController::class,'store']);
