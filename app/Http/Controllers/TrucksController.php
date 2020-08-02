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
    	$truck = auth()->user()->addTruck($this->validateTruck());
        $truck->updateCoordinates($request->state_id);
    	return redirect()->route('home');
    }

    public function show(Request $request, Truck $truck)
    {
        $states = State::all();
        $this->authorize('update', $truck);
        return view('trucks.editlocation', compact('truck', 'states'));
    }

    public function edit(Truck $truck)
    {
        $this->authorize('update', $truck);
        $states = State::all();
        return view('trucks.create', compact('truck', 'states'));
       
    }

    public function update(Truck $truck)
    {
        $this->authorize('update', $truck);
        $truck->update($this->validateTruck());
        $truck->updateCoordinates($truck->state_id);
        return redirect()->route('home');
    }

    public function destroy(Truck $truck)
    {
        $this->authorize('update', $truck);
        $truck->delete();
        return redirect()->route('home');
    }

    public function updateLocation(Request $request, Truck $truck)
    {
        $this->authorize('update', $truck);

        $truck->update(request()->validate([
            'state_id' =>'required',
            'city' => 'required|min:3|max:255'
        ]));
        $truck->updateCoordinates($request->state_id);
        return redirect()->route('home');
    }

    public function getlocations()
    {
        $trucks = Truck::all();
        if(auth()->user() && auth()->user()->role === "Owner")
        {
            $trucks = auth()->user()->trucks;   
        }
        
        return $trucks; 
    }

    protected function validateTruck()
    {
        return request()->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'state_id' =>'required',
            'city' => 'required|min:3|max:255',
            'website' => 'sometimes|max:25',
            'instagram' => 'sometimes|max:25',
            'facebook' => 'sometimes|max:25',
            'twitter' => 'sometimes|max:25',
        ]);
    }
}
