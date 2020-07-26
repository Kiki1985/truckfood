<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Truck;

class TrucksController extends Controller
{
    public function create()
    {
    	return view('trucks.create');
    }

    public function store(Request $request)
    {
    	Truck::create([
    	  'user_id' => auth()->user()->id,	
          'name' => $request->name,
          'description' => $request->description,
          'website' => $request->website,
          'instagram' => $request->instagram,
          'facebook' => $request->facebook,
          'twitter' => $request->twitter,
    	]);
    	return redirect()->route('home');
    }
}
