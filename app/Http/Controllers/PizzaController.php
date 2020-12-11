<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use Illuminate\Support\Facades\Auth;

class PizzaController extends Controller
{
    public function index()
    {
        $auth = Auth::check();
        $role = 0;
        if($auth){
            $role = Auth::user()->role;
        }

        $pizza = Pizza::paginate(6);
     
        

       

        // return view('home')->with('auth',$auth)->with('role','$role')->with('pizza','$pizza');
        return view('welcome')->with('pizza',$pizza)->with('role',$role)->with('auth',$auth);
       
    }
    public function show($id){
        $pizza = Pizza::find($id);
        // return $pizza;
        return view('details')->with('pizza',$pizza);
    }
}
