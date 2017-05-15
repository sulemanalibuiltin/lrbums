<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $district=\App\Models\District::where('title', 'Peshawar')->first();
        $department_type=\App\Models\DepartmentType::where('title', 'Developer')->first();
        $department=\App\Models\Department::create
        (
            [
                'district_id' => $district->id,
                'department_type_id' => $department_type->id,
                'title' => 'The Developers',
                'short_name' => 'Developers',
                'description' => 'Department of Developers',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Chief Secretary Office')->first()->id,
                'title' => 'Office of the Chief Secretary',
                'short_name' => 'CS Office',
                'description' => 'Office of the Chief Secretary, Govt. of KP',
                'department_level' => 1
            ]
        );

        $dept=
        [
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Administration',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Agriculture',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Auqaf, Hajj, Religious & Minority Affairs',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Communication & Works',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Culture, Sports, Tourism, Archaeology & Youth Affairs',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Elementary & Secondary Education',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Energy & Power',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Establishment',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Excise & Taxation',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Finance',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Food',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Forestry, Environment & WildeLife',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Health',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Higher Education',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Home & Tribal Affairs',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Housing',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Industries',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Information & Public Relations',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Inter Provincial Coordination',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Irrigation',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Labour',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Law, Parliamentary Affairs and Human Rights',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Local Government',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Minerals Development',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Planning & Development',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Population Welfare',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Public Health Engineering',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Relief, Rehabilitation & Settlement',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Revenue',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Science & Technology and Information Technology',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Science & Technology and Information Technology',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Social Welfare',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Tourism',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Transport',
                'department_level' => 1
            ],
            [
                'district_id' => $district->id,
                'department_type_id' => \App\Models\DepartmentType::where('title', 'Govt. Department')->first()->id,
                'title' => 'Zakat & Ushr',
                'department_level' => 1
            ],


        ];

        DB::table('departments')->insert($dept);



    }
}
