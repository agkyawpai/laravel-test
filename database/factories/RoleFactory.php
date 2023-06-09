<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'role_name' => $faker->jobTitle,
        'created_by' => $faker->name,
        'updated_by' => $faker->name,
    ];
});
