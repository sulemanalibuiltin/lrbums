<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentType extends Model
{
    //
    protected $table = 'department_types';


    public function departments()
    {
        return $this->hasMany('\App\Models\Department');
    }
}
