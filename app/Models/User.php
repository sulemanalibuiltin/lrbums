<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class User extends Model
{
    //
    use SoftDeletes;

    protected $table = 'users';

    protected $fillable = ['role_id', 'department_id','designation_id', 'title','contact','email','username','password', 'status', 'created_by'];


    public static function isLoggedIn()
    {
        if (!Session::has('user')) {
            return false;
        }

        return true;

    }

    public function department()
    {
        return $this->belongsTo('\App\Models\Department');
    }

    public function role()
    {
        return $this->belongsTo('\App\Models\Role');
    }

    public function designation()
    {
        return $this->belongsTo('\App\Models\Designation');
    }


    /*public static function getModules()
    {

        return $modules=Module::with('actions')->where('parent_id', 0)->get();

    }*/
}
