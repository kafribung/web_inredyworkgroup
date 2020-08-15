<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Creation;
use Faker\Generator as Faker;

$factory->define(Creation::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'video' => 'https://www.youtube.com/embed/ucV7ynY4M8A',
        'team'  => 'Oljen, Mubaraq, Irex',
        'concentration_id' => 1,
        'description'      => $faker->paragraph(50),
        'slug' => $faker->sentence(),
        'user_id' => 1,
    ];
});
