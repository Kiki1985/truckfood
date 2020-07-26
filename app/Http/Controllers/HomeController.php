<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Truck;

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
    public function index()
    {
        if(auth()->user()->role === "Admin")
        {
            $trucks = Truck::all();
        }else{
            $trucks = auth()->user()->trucks;
        }
        
        return view('home', compact('trucks'));
    }
}
