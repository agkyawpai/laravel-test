<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Assign;
use App\Employee;
use Faker\Generator as Faker;

$factory->define(Assign::class, function (Faker $faker) {
    $startDate = $faker->dateTimeBetween('2022-10-01', 'now');
    $endDate = $faker->dateTimeBetween($startDate, 'now');
    return [

        'employee_id' => function () {
            return Employee::all()->random()->id;
        },
        'title' => $faker->jobTitle,
        'start_date' => $startDate,
        'end_date' => $endDate,
        'progress' => $faker->numberBetween(0, 100),
    ];
});
