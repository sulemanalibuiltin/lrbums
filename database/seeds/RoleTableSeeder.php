<?php

use App\Models\Module;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $module=Module::where('title', 'Dashboard')->first();
        $role=new Role();
        $role->homepage_id=$module->id;
        $role->title='Admin';
        $role->created_by=1;
        $role->save();

        $role->modules()->attach($module->id);
    }
}
