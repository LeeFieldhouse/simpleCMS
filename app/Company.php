<?php

namespace App;
use App\Employee;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
