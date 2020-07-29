<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Truck;
use Faker\Generator as Faker;

$factory->define(Truck::class, function (Faker $faker) {
    $states = new \App\User();
    $states = $states->statesList();

	$fakerState = $faker->state;

	$state = \App\State::where('state', $fakerState)->get();

	$state_id = $state[0]->id;

    return [
        'user_id' => \App\User::all()->random()->id,
        'state_id' => $state_id,
        'lat' => $states[$fakerState][0],
        'lng' => $states[$fakerState][1],
        'city' => $faker->city,
        'name' => $faker->company(),
        'description' => $faker->text(80),
    ];
});
