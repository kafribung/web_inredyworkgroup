<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Inventory;
use Faker\Generator as Faker;

$factory->define(Inventory::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'img'   => 'default_invenrory.jpg',
        'code'  => $faker->ean8(),
        'owner' => 'Kak Ushy',
        'total' => '20',
        'category' => 'Rumah Tangga',
        'condition' => 'Baik',
        'description' => $faker->paragraph(30),
        'slug'  => \Str::slug($faker->sentence()),
        'user_id' => 1,
    ];
});
