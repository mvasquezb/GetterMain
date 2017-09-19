<?php

use Faker\Generator as Faker;

$factory->define(App\Purchase::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1, 10),
        'offer_id' => random_int(1, 10),
    ];
});
