<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\State;

class Truck extends Model
{
	protected $guarded = [];
	
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function updateCoordinates($stateId)
    {
        $states = new State();
        $state = $states->find($stateId)->state;
        $states = $states->statesList();

        $lat = $states[$state][0];
        $lng = $states[$state][1];

        $truck = Truck::update([
            'lat' => $lat,
            'lng' =>$lng
        ]);
    }

    public static function loadlocations()
    {
        $trucks = Truck::all();
        if(auth()->user() && auth()->user()->role === "Owner"){
            $trucks = auth()->user()->trucks;
        }
        return $trucks;
    }

    /*public function path()
    {
        return route('editTruck', (str_replace(' ', '_', $this->name)));
    }*/
}
