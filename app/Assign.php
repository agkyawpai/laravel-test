<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assign extends Model
{
    protected $table = 'assigns';
    use SoftDeletes;
    protected $fillable = [
        'employee_id',
        'title',
        'start_date',
        'end_date',
        'deleted_at'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
