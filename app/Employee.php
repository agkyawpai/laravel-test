<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    protected $table = 'employees';
    use SoftDeletes;
    protected $fillable = [
        'emp_name',
        'password',
        'emp_phone_no',
        'emp_address',
        'created_by',
        'updated_by',
        'deleted_at'
    ];
    public function assignments()
    {
        return $this->hasMany(Assign::class);
    }
}
