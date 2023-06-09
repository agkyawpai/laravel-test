<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleDepEmp extends Model
{
    protected $table = 'role_dep_emp';
    protected $fillable = [
        'role_id',
        'department_id',
        'employee_id',
    ];
}
