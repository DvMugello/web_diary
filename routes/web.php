<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfilController;

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
