<?php

use Faker\Generator as Faker;

$factory->define(App\Store::class, function (Faker $faker) {
    return [
        'latitude' => $faker->latitude(),
        'longitude' => $faker->longitude(),
        'business_id' => factory(App\Business::class)->create()->id,
    ];
});
