<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(UserAddressTableSeeder::class);
        // $this->call(UserPaymentTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AssignsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(RoleDepEmpTableSeeder::class);
    }
}
