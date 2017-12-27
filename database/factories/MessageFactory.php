<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'name'    => $faker->name,
        'email'   => $faker->email,
        'number'  => $faker->phoneNumber,
        'message' => $faker->paragraph,
    ];
});
