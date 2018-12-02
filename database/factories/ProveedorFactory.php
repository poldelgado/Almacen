<?php

use Faker\Generator as Faker;
use App\Proveedor;
use App\Domicilio;

$factory->define(Proveedor::class, function (Faker $faker) {
    $domicilio = Domicilio::all()->random();
    return [
        'nombre' => $faker->company,
        'telefono' => 381,
        'domicilio_id' => $domicilio->id,

    ];
});
