<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $req, $id){
        // print_r($req->input());
        $validated = $req->validate([
            'quantity' => ['required','min:1','numeric']
            
        ]);
        $user = Auth::user()->id;
        $pizza = Pizza::findOrfail($id);

        // return back()->with('successMsg','Pizza Added to Cart!');
        return $user;
    }

    
}
