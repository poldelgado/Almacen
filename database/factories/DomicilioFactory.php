<?php

use Faker\Generator as Faker;
use App\Location;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Domicilio::class, function (Faker $faker) {

    $location = Location::all()->random();

    return [
        'calle' => $faker->streetName,
        'barrio' => $faker->city,
        'numero' => $faker->numberBetween($min = 100, $max = 3000),
        'location_id' => $location->id,
    ];

});