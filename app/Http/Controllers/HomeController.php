<?php

namespace App\Http\Controllers;
//I MADE GANAL ASMARA JAYA - 2201799386
use Illuminate\Http\Request;
use App\User;
use App\Pizza;

use Illuminate\Support\facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
}
