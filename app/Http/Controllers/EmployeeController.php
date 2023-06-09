<?php

namespace App\Http\Controllers;

use App\Role;
use App\Assign;
use App\Employee;
use App\Department;
use App\RoleDepEmp;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
        public function createEmp(Request $request)
    {
        $employee = Employee::create([
            'emp_name' => $request->emp_name,
            'password' => $request->password,
            'emp_phone_no' => $request->emp_phone_no,
            'emp_address' => $request->emp_address,
            'created_by' => 'ABC',
            'updated_by' => 'ABC',
        ]);

        $rde = RoleDepEmp::create([
            'role_id' => $request->role_id,
            'department_id' => $request->department_id,
            'employee_id' => $employee->id,
        ]);
        return response()->json(['message' => 'Employee created successfully'], 201);
    }
}
