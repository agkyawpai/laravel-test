<?php

use App\RoleDepEmp;
use App\Role;
use App\Department;
use App\Employee;
use Faker\Generator as Faker;

$factory->define(RoleDepEmp::class, function (Faker $faker) {
    $role = Role::inRandomOrder()->first();
    $department = Department::inRandomOrder()->first();
    $employee = Employee::inRandomOrder()->first();

    return [
        'role_id' => $role->id,
        'department_id' => $department->id,
        'employee_id' => $employee->id,
    ];
});

