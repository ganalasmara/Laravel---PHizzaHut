<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Cart;
use App\CartDetail;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\TransactionDetail;
//I MADE GANAL ASMARA JAYA - 2201799386

class TransactionController extends Controller
{
    public function index(){
        $user = Auth::user()->id;
        $trans = Transaction::where('user_id',$user)->get();

        return view('transaction')->with('trans',$trans);
    }

    public function detail($trans_id){
        $trans = TransactionDetail::where('transaction_id',$trans_id)->get();
        $total = Transaction::findOrfail($trans_id)->total;

        return view('transdetails')->with('trans',$trans)->with('total',$total);
        // return $trans;
    }

    public function all(){
        $trans = Transaction::all();

        return view('alltrans')->with('trans',$trans);
    }
}
