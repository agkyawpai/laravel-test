<?php

use App\RoleDepEmp;
use Illuminate\Database\Seeder;

class RoleDepEmpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RoleDepEmp::class, 100)->create();
    }
}
