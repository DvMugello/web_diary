<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('Main.admin.index',[
            'title'=>'My Admin'
        ]);
    }
}
