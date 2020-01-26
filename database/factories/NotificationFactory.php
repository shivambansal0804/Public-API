<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notification;
use Faker\Generator as Faker;

$factory->define(Notification::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->numerify('Post ###'),
        'body' => $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});
