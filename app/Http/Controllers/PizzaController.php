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

    public function search(Request $req){
        $pizza = Pizza::where('name', 'like', '%' . $req->search . '%')->paginate(6);

            return view('welcome', ['pizza' => $pizza]);
    }

    public function show($id){
        $pizza = Pizza::findOrfail($id);
        // return $pizza;
        return view('details')->with('pizza',$pizza);
    }

    public function add(){


        return view('add');
    }
    public function insert(Request $req){

        $validated = $req->validate([
            'name' => ['required','max:20','string'],
            'description' => ['required', 'min:20','string'],
            'price' => ['required','min:10000','numeric'],
            'photo' => ['required','image']
        ]);

        $pizza = new Pizza;
        $photo = $req->file('photo')->getClientOriginalName();
        $req->photo->move(public_path('img/'), $photo);

        $pizza->name = $req->name;
        $pizza->price = $req->price;
        $pizza->description = $req->description;
        $pizza->photo = '../img/' . $photo;

        $pizza->save();

        return back()->with('successMsg','Pizza Added!');
    
    }
    public function edit($id){
        $pizza = Pizza::findOrfail($id);
        return view('edit')->with('pizza',$pizza);
    }
    public function update(Request $req, $id){

        $validated = $req->validate([
            'name' => ['required','max:20','string'],
            'description' => ['required', 'min:20','string'],
            'price' => ['required','min:10000','numeric'],
            'photo' => ['required','image']
        ]);

        $pizza = Pizza::findOrfail($id);
        $photo = $req->file('photo')->getClientOriginalName();
        $req->photo->move(public_path('img/'), $photo);

        $pizza->name = $req->name;
        $pizza->price = $req->price;
        $pizza->description = $req->description;
        $pizza->photo = '../img/' . $photo;

        $pizza->save();

        return back()->with('successMsg','Pizza Edited!');
    
    }

    public function delete($id){
        Pizza::findOrfail($id)->delete();
        return back();
    }
}
