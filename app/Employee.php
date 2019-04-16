<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;

class Employee extends Model
{
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
