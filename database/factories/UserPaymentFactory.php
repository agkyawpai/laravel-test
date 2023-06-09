<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserPayment;
use Faker\Generator as Faker;

$factory->define(UserPayment::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class)->create()->id,
        'payment_type' => $faker->randomElement(['Credit Card', 'PayPal', 'Bank Transfer']),
        'provider' => $faker->company,
        'account_no' => $faker->creditCardNumber,
    ];
});
