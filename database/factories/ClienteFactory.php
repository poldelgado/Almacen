<?php

use Faker\Generator as Faker;
use App\Cliente;
use App\Domicilio;

$factory->define(Cliente::class, function (Faker $faker) {

    $domicilio = Domicilio::all()->random();
    return [
        'nombre' => $faker->name,
        'apellido' => $faker->lastName,
        'dni' => $faker->randomNumber(8),
        'estado' => $faker->randomElement(['activo','deudor']),
        'telefono' => 381,
        'domicilio_id' => $domicilio->id,
    ];
});
