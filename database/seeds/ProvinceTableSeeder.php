<?php

use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $country_id=\App\Models\Country::where('title','Pakistan')->first()->id;
        $p=Province::create
        (
            [
                'title' => 'Khyber Pakhtunkhwa',
                'country_id' => $country_id
            ]
        );




    }
}
