<?php

namespace App\Utilities;
use App\Models\Module;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDO;

/**
 * Created by PhpStorm.
 * User: PMRU-5
 * Date: 27-Mar-17
 * Time: 12:36 PM
 */
class UserModules
{

    public $modules;

    public function getModules()
    {
        $modules=DB::table('modules')
            ->select(DB::raw('`modules`.`id`, `modules`.`title`, `modules`.`parent_id`, `modules`.`route`, `modules`.`icon`'))
            ->join('module_role', 'modules.id', '=', 'module_role.module_id')
            ->where([['module_role.role_id','=',Session::get('user')[0]->role->id],
                ['modules.menu_status','=', 1],
                ['modules.status','=', 1],
                ['modules.parent_id','=', 0]])
            ->orderBy('id', 'asc')->get();

        $this->modules=[];
        foreach ($modules as $module)
        {
            $actions=DB::table('modules')
                ->select(DB::raw('`modules`.`id`, `modules`.`title`, `modules`.`parent_id`, `modules`.`route`, `modules`.`icon`'))
                ->join('module_role', 'modules.id', '=', 'module_role.module_id')
                ->where([['module_role.role_id','=',Session::get('user')[0]->role->id],
                    ['modules.menu_status','=', 1],
                    ['modules.status','=', 1],
                    ['modules.parent_id','=', $module->id]])
                ->orderBy('id', 'asc')
                ->get();


            $assigned_module=
                [
                    'id'=>$module->id,
                    'title'=>$module->title,
                    'icon'=>$module->icon,
                    'actions'=>$actions->toArray()
                ];
            $this->modules[]=$assigned_module;

        }



        return $this->modules;
    }

}