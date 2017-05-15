<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(CountryTableSeeder::class);
        //$this->call(ProvinceTableSeeder::class);
        //$this->call(DivisionTableSeeder::class);
        //$this->call(DistrictTableSeeder::class);
        //$this->call(DepartmentTypeTableSeeder::class);
        //$this->call(DepartmentTableSeeder::class);
        //$this->call(DesignationTableSeeder::class);
        //$this->call(TehsilTableSeeder::class);
        //$this->call(ModuleTableSeeder::class);
        //$this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
