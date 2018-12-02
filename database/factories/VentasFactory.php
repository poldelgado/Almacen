<?php

use Faker\Generator as Faker;
use App\Venta;
use App\User;
use App\Cliente;

$factory->define(Venta::class, function (Faker $faker) {
    $usuario = User::all()->random();
    $cliente = Cliente::all()->random();
    return [
        'monto' => $faker->randomFloat(2,35,45000),
        'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'user_id' => $usuario->id,
        'cliente_id' => $cliente->id,
    ];
});
