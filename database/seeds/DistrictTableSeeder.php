<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $division_peshawar = \App\Models\Division::where('title', 'Peshawar')->first();
        $division_dikhan = \App\Models\Division::where('title', 'Dera Ismail Khan')->first();
        $division_bannu = \App\Models\Division::where('title', 'Bannu')->first();
        $division_hazara = \App\Models\Division::where('title', 'Hazara')->first();
        $division_kohat = \App\Models\Division::where('title', 'Kohat')->first();
        $division_mardan = \App\Models\Division::where('title', 'Mardan')->first();
        $division_malakand = \App\Models\Division::where('title', 'Malakand')->first();


        /*$d=\App\Models\District::create
        (
            [
                'title' => 'Peshawar',
                'division_id' => $division_peshawar->id,
                'created_by' => 1
            ]
        );*/
        $districts =
            [
                ['title' => 'Abbottabad', 'division_id' => $division_hazara->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Bannu', 'division_id' => $division_bannu->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Battagram', 'division_id' => $division_hazara->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Buner', 'division_id' => $division_malakand->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Charsadda', 'division_id' => $division_peshawar->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Chitral', 'division_id' => $division_malakand->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Dera Ismail Khan', 'division_id' => $division_dikhan->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Hangu', 'division_id' => $division_kohat->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Haripur', 'division_id' => $division_hazara->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Karak', 'division_id' => $division_kohat->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Kohat', 'division_id' => $division_kohat->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Upper Kohistan', 'division_id' => $division_hazara->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Lakki Marwat', 'division_id' => $division_bannu->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Lower Dir', 'division_id' => $division_malakand->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Malakand', 'division_id' => $division_malakand->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Mansehra', 'division_id' => $division_hazara->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Mardan', 'division_id' => $division_mardan->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Nowshera', 'division_id' => $division_peshawar->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Peshawar', 'division_id' => $division_peshawar->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Shangla', 'division_id' => $division_malakand->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Swabi', 'division_id' => $division_mardan->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Swat', 'division_id' => $division_malakand->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Tank', 'division_id' => $division_dikhan->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Upper Dir', 'division_id' => $division_malakand->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Torghar', 'division_id' => $division_hazara->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => 'Lower Kohistan', 'division_id' => $division_hazara->id, 'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]
            ];


        DB::table('districts')->insert
        (
            $districts
        );
    }
}
