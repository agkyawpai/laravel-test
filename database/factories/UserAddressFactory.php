<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserAddress;
use Faker\Generator as Faker;

$factory->define(UserAddress::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class)->create()->id,
        'address_line1' => $faker->streetAddress,
        'address_line2' => $faker->secondaryAddress,
        'city' => $faker->city,
        'postal_code' => $faker->postcode,
        'country' => $faker->country,
        'telephone' => $faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
    ];
});
