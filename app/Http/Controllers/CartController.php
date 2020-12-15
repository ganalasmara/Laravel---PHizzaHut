<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Cart;
use App\CartDetail;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\TransactionDetail;

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

    public function checkout($cart_id){
        $trans = new Transaction();
        $trans->user_id = Auth::user()->id;
        $trans->total=0;
        $trans->save();
        $cart = CartDetail::where('cart_id',$cart_id)->get();
        $total=0;

        for($a=0;$a<count($cart);$a++){
            $transDetails = new TransactionDetail();

            $transDetails->transaction_id = $trans->id;
            $transDetails->pizza_id = $cart[$a]->pizza_id;
            $transDetails->quantity = $cart[$a]->quantity;
            $total= $total+($transDetails->quantity * $transDetails->pizza->price);
            $transDetails->save();
            $cart[$a]->delete();
        }
        $trans->total=$total;
        $trans->save();

        return back()->with('successMsg','Checkout Success!');

    }

    
}
