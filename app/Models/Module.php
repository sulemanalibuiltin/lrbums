<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Module extends Model
{
    //
    use SoftDeletes;

    protected $table = 'modules';

    protected $fillable = ['parent_id','title', 'description','type','menu_status','route', 'icon', 'created_by'];


    public function roles()
    {
        return $this->belongsToMany('\App\Models\Role')->withTimestamps();
    }

    public function actions()
    {
        return $this->hasMany('\App\Models\Module','parent_id', 'id');
    }

    public function role()
    {
        return $this->hasOne('\App\Model\Role');
    }

    public static function compileModuleIds($module_ids){

        $compiled_array = array();
        foreach($module_ids as $module_id){

            $compiled_array[] = (int) $module_id;
            $this_parent = DB::table("modules")->select(DB::raw('parent_id'))->whereIn('id', array($module_id))->first();

            if($this_parent->parent_id != 0){
                $compiled_array[] = $this_parent->parent_id;
            }

        }
        return array_unique($compiled_array);
    }

    public static function moduleIdFromName($action_name)
    {

        $action=Module::where('route', $action_name)->first();
        if($action != null) {
            if ($action->count() > 0) {
                $action = Module::where([['parent_id', '=', $action->parent_id], ['id', '=', $action->id]])->first();
                return $action;
            }
        }

        return null;




    }






}
