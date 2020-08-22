<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Learning;
use Faker\Generator as Faker;

$factory->define(Learning::class, function (Faker $faker) {
    return [
        'img'       => 'default_learning.jpg',
        'time'      => '2020-08-13 11:16:00',
        'user_id'   => 6,
        'concentration_id' => 3,
    ];
});
