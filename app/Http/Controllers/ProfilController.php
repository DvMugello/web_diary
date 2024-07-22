<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilController extends Controller
{
    public function index(User $user){
        return view('/profil',[
            'title'=>'My Profil',
            'users'=> $user->id
        ]);
    }
}
