<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    //

    use SoftDeletes;
    protected $table = 'departments';


    protected $fillable = ['district_id', 'department_type_id', 'title', 'short_name', 'description', 'department_level', 'status', 'created_by'];



    public function users()
    {
        return $this->hasMany('\App\Models\User');
    }

    public function department_type()
    {
        return $this->belongsTo('\App\Models\DepartmentType');
    }

}
