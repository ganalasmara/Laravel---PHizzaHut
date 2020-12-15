<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Cart;
use App\CartDetail;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        
        $cart = Cart::where('user_id', Auth::user()->id)->firstOrfail();

        return view('cart')->with('cart',$cart);
    }
    public function add(Request $req, $id){
        // print_r($req->input());
        $validated = $req->validate([
            'quantity' => ['required','min:1','numeric']
            
        ]);
        $user = Auth::user()->id;
        $pizza = Pizza::findOrfail($id);
        $cart = new Cart();

        if(!Cart::where('user_id',$user)->exists()){
            $cart->user_id = $user;
            $cart->save();
        }else{
            $cart = Cart::where('user_id', $user)->firstOrFail();
        }

        $cart_details = new CartDetail();

        $cart_details->cart_id = $cart->id;
        $cart_details->pizza_id = $id;
        $cart_details->quantity = $req->quantity;
        $cart_details->save();


        return back()->with('successMsg','Pizza Added to Cart!');
        // return $cart_details;
    }

    public function update(Request $req,$cart_id,$pizza_id){
        $cart= CartDetail::where('cart_id',$cart_id)->where('pizza_id',$pizza_id)->first();
        $validated = $req->validate([
            'quantity' => ['required','min:1','numeric']
            
        ]);

        $cart->quantity = $req->quantity;
        $cart->save();

        return back()->with('successMsg','Pizza quantity updated!');
    }

    public function delete($cart_id, $pizza_id){
        $cart= CartDetail::where('cart_id',$cart_id)->where('pizza_id',$pizza_id)->first()->delete();

        return back()->with('successMsg','Pizza has been deleted from Cart!');
    }

    
}
