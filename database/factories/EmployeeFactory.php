<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'emp_name' => $faker->name,
        'password' => Hash::make($faker->password),
        'emp_phone_no' => $faker->phoneNumber,
        'emp_address' => $faker->address,
        'created_by' => $faker->name,
        'updated_by' => $faker->name,
    ];
});
