<?php

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        /*$role_admin=\App\Models\Role::where('title','Admin')->first();
        $module=new \App\Models\Module();
        $module->parent_id=0;
        $module->type='controller';
        $module->title='Modules';
        $module->description='Manage Modules';
        $module->route='modules';
        $module->menu_status=0;
        $module->icon='fa fa-sitemap';
        $module->save();*/

        $module=Module::create
        (
            [
                'parent_id' => 0,
                'type' => 'controller',
                'title' => 'Dashboard',
                'route' => 'dashboard',
                'icon' => 'fa fa-home',
                'menu_status' => 1,
                'created_by' => 1
            ]

        );
    }

}
