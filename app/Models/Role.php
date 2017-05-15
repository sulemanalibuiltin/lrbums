<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    //

    use SoftDeletes;

    protected $table = 'roles';

    protected $fillable = ['title', 'homepage_id', 'description', 'status', 'created_by'];


    public function modules()
    {
        return $this->belongsToMany('\App\Models\Module');
    }

    public function homepage()
    {
        return $this->belongsTo('\App\Models\Module');
    }
    public function users()
    {
        return $this->hasMany('\App\Models\User');
    }

    public static function allowedModules($id)
    {
        $modules=DB::table('modules')
            ->select(DB::raw('`modules`.`id`, `modules`.`title`, `modules`.`parent_id`, `modules`.`route`, `modules`.`icon`'))
            ->join('module_role', 'modules.id', '=', 'module_role.module_id')
            ->where([['module_role.role_id','=', $id],
                ['modules.status','=', 1]])
            ->orderBy('id', 'asc')->get();

        return $modules;
    }


}
