<?php

namespace App\Http\Controllers;
//I MADE GANAL ASMARA JAYA - 2201799386
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function all(){
        $user = User::all();

        return view('alluser')->with('user',$user);
        // return $user;
    }
}
