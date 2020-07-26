<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Truck;
use App\State;

class TrucksController extends Controller
{
    public function create()
    {
    	abort_unless(auth()->user(), 403);
        return view('trucks.create', [
            'states' => State::all()
        ]);
    }

    public function store(Request $request)
    {
        abort_unless(auth()->user(), 403);
    	auth()->user()->addTruck($this->validateTruck());
    	return redirect()->route('home');
    }

    public function edit(Truck $truck)
    {
        $this->authorize('update', $truck);
        return view('trucks.edit', compact('truck'));
    }

    public function update(Truck $truck)
    {
        $this->authorize('update', $truck);
        $truck->update($this->validateTruck());
        return redirect()->route('home');
    }

    public function destroy(Truck $truck)
    {
        $this->authorize('update', $truck);
        $truck->delete();
        return redirect()->route('home');
    }

    protected function validateTruck()
    {
        return request()->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'state_id' =>'required',
            'town' => 'required|min:3|max:255',
            'website' => 'sometimes|max:25',
            'instagram' => 'sometimes|max:25',
            'facebook' => 'sometimes|max:25',
            'twitter' => 'sometimes|max:25',
        ]);
    }
}
