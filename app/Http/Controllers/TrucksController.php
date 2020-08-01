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

    public function addlatlng(Request $request, Truck $truck)
    {
        $this->authorize('update', $truck);

        $truck->update([
            'state_id' => $request['state_id'],
            'city' => $request['city'],
            'lat' => $lat,
            'lng' =>$lng
        ]);
        $truck->updateCoordinates($request->state_id);
        return redirect()->route('home');
    }

    public function getlatlng()
    {
       if(auth()->user()->role === "Admin")
        {
            $trucks = Truck::all();
        }else{
            $trucks = auth()->user()->trucks;
        }
       return $trucks; 
    }

    public function getlatlngWelcome()
    {
        $trucks = Truck::all();
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
