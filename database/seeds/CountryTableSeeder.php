<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $country=Country::create
        (
            [
                'title' => 'Pakistan'
            ]
        );
    }
}
