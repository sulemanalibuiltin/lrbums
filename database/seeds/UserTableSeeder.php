<?php

use App\Models\Department;
use App\Models\Designation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user=User::create
        (
            [
                'role_id' => Role::where('title','Admin')->first()->id,
                'department_id' => Department::where('title','The Developers')->first()->id,
                'designation_id' => Designation::where('title','Android Developer')->first()->id,
                'title' => 'Izhar',
                'email' => 'izhar.hussain22@hotmail.com',
                'username' => 'izhar24',
                'password' => sha1(md5('123456')),
                'created_by' => 1
            ]
        );
    }
}
