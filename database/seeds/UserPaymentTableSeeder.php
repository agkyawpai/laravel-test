<?php

use App\UserPayment;
use Illuminate\Database\Seeder;

class UserPaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UserPayment::class, 50)->create();
    }
}
