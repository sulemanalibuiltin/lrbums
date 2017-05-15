<?php

use Illuminate\Database\Seeder;

class DesignationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $designation=\App\Models\Designation::create
        (
            [
                'title' => 'Android Developer',
                'created_by' => 1
            ]
        );
    }
}
