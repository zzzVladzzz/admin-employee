<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignEmployee extends Model
{
    protected $table = 'assign_employee';

    protected $fillable = ['user_id', 'employee_id'];
}
