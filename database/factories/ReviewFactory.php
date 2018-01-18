<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'thumb_up' =>  $faker->boolean,
    ];
});

