<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Department;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {
    return [
        'dep_name' => $faker->company,
        'created_by' => $faker->name,
        'updated_by' => $faker->name,
    ];
});
