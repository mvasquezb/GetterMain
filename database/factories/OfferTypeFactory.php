<?php

use Faker\Generator as Faker;

$factory->define(App\OfferType::class, function (Faker $faker) {
    $name = $faker->sentence(10);
    return [
        'name' => $name,
        'slug' => str_slug($name),
    ];
});
