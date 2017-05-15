<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DepartmentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*$department_type=\App\Models\DepartmentType::create
        (
            [
                'title' => 'Developer',

            ]
        );*/

        $dept_types=
            [
                [
                    'title' => 'Developer',
                    'description' => NULL,
                    'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'title' => 'Chief Secretary Office',
                    'description' => 'Office of the Chief Secretary, Govt of KP',
                    'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]

            ];

        DB::table('department_types')->insert($dept_types);
    }
}
