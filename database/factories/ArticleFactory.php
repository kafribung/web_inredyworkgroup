<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'img'   => 'default_article.png',
        'description' => $faker->paragraph(50),
        'slug'  => \Str::slug($faker->sentence()),
        'user_id' => 1,
    ];
});
