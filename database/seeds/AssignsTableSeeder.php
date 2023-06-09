<?php

use Illuminate\Database\Seeder;
use App\Assign;
class AssignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Assign::class, 100)->create();
    }
}
