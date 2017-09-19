<?php

use Faker\Generator as Faker;

$factory->define(App\Offer::class, function (Faker $faker) {
    $endDate = $faker->dateTime;
    return [
        'start_date' => $faker->dateTime($endDate),
        'end_date' => $endDate,
        'description' => $faker->text,
        'active' => (bool) random_int(0, 1),
        'product_id' => random_int(1, 10),
        'store_id' => random_int(1, 10),
        'offer_type_id' => random_int(1, 10),
    ];
});
