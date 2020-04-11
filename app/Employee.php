<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public static $file;

    protected $table = 'employee';

    protected $fillable = ['name', 'email', 'phone', 'address', 'contract_date', 'contract_expiration_date', 'file_contract', 'manager_id'];
}
