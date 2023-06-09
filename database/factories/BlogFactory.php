<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'body' => $faker->paragraph,
        'is_hidden' => $faker->boolean,
        'user_id' => null,
    ];
});
