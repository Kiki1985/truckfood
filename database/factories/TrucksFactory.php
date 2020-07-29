<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Truck;
use Faker\Generator as Faker;

$factory->define(Truck::class, function (Faker $faker) {
	//$id = rand(0, 4);
	/*$states = [ [0, 00.00, 00.00],
	            [1, 32.318230, -86.902298],
	            [2, 66.160507, -153.369141],
	            [3, 34.048927, -111.093735],
	            [4, 34.799999, -92.199997],
	            [5, 36.778259, -119.417931],
	            [6, 39.113014, -105.358887],

	          ];*/
	//$city = \App\State::where('id', $states[$id][0])->get();
    $states = [
               'Alabama' => [32.318230, -86.902298],
               'Alaska' => [66.160507, -153.369141],
               'Arizona' => [34.048927, -111.093735],
               'Arkansas' => [34.799999, -92.199997],
               'California' => [36.778259, -119.417931],
               'Colorado' => [39.113014, -105.358887],
               'Connecticut' => [41.599998, -72.699997],
               'Delaware' => [39.000000, -75.500000],
               'Florida' => [27.994402, -81.760254],
               'Georgia' => [33.247875, -83.441162],
               'Hawaii' => [19.741755, -155.844437],
               'Idaho' => [44.068203, -114.742043],
               'Indiana' => [40.273502, -86.126976],
               'Kansas' => [38.500000, 	-98.000000],
               'Kentucky' => [37.839333, -84.270020],
               'Louisiana' => [30.391830, -92.329102],
               'Maine' => [45.367584, -68.972168],
               'Maryland' => [39.045753, -76.641273],
               'Massachusetts' => [42.407211, -71.382439],
               'Michigan' => [44.182205, -84.506836],
               'Minnesota' => [46.392410, -94.636230],
               'Mississippi' => [33.000000, -90.000000],
               'Missouri' => [38.573936, -92.603760],
               'Montana' => [46.965260, -109.533691],
               'Nebraska' => [41.500000, -100.000000],
               'Nevada' => [39.876019, -117.224121],
               'New Hampshire' => [44.000000, -71.500000],
               'New Jersey' => [39.833851, -74.871826],
               'New Mexico' => [34.307144, -106.018066],
               'New York' => [40.730610, -73.935242],
               'North Carolina' => [35.782169, -80.793457],
               'North Dakota' => [47.650589, -100.437012],
               'Ohio' => [40.367474, -82.996216],
               'Oklahoma' => [36.084621, -96.921387],
               'Oregon' => [44.000000, -120.500000],
               'Pennsylvania' => [41.203323, -77.194527],
               'Rhode Island' => [41.700001, -71.500000],
               'South Carolina' => [33.836082, -81.163727],
               'South Dakota' => [44.500000, -100.000000],
               'Tennessee' => [35.860119, -86.660156],
               'Texas' => [31.000000, -100.000000],
               'Utah' => [39.419220, -111.950684],
               'Vermont' => [44.000000, -72.699997],
               'Virginia' => [37.926868, -78.024902],
               'Washington' => [47.751076, -120.740135],
               'West Virginia' => [39.000000, -80.500000],
               'Wisconsin' => [44.500000, -89.500000],
               'Wyoming' => [43.075970, -107.290283],
              ];

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
