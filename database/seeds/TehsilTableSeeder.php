<?php

use App\Models\District;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TehsilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //$district_id=\App\Models\District::where('title','Peshawar')->first()->id;

        $tehsils =
            [
                [
                    'district_id' => District::where('title', 'Bannu')->first()->id,
                    'title' => 'Bannu',
                    'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Bannu')->first()->id,
                    'title' => 'Domel',
                    'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Lakki Marwat')->first()->id,
                    'title' => 'Lakki Marwat',
                    'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Lakki Marwat')->first()->id,
                    'title' => 'Naurang',
                    'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Dera Ismail Khan')->first()->id,
                    'title' => 'Dera Ismail Khan',
                    'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Dera Ismail Khan')->first()->id,
                    'title' => 'Daraban',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Dera Ismail Khan')->first()->id,
                    'title' => 'Kulachi',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Dera Ismail Khan')->first()->id,
                    'title' => 'Paharpur',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Dera Ismail Khan')->first()->id,
                    'title' => 'Paroa',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Tank')->first()->id,
                    'title' => 'Tank',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Abbottabad')->first()->id,
                    'title' => 'Abbottabad',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Abbottabad')->first()->id,
                    'title' => 'Havelian',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Batagram')->first()->id,
                    'title' => 'Allai',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Batagram')->first()->id,
                    'title' => 'Batagram (Banna)',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Haripur')->first()->id,
                    'title' => 'Ghazi',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Lower Kohistan')->first()->id,
                    'title' => 'Palas',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Lower Kohistan')->first()->id,
                    'title' => 'Pattan',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Mansehra')->first()->id,
                    'title' => 'Balakot',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Mansehra')->first()->id,
                    'title' => 'Mansehra',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Mansehra')->first()->id,
                    'title' => 'Oghi',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Torghar')->first()->id,
                    'title' => 'Tor Ghar (F.R. Kala Dhaka)',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Upper Kohistan')->first()->id,
                    'title' => 'Dassu',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Upper Kohistan')->first()->id,
                    'title' => 'Kandia',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Hangu')->first()->id,
                    'title' => 'Hangu',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Hangu')->first()->id,
                    'title' => 'Tall',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Karak')->first()->id,
                    'title' => 'Banda Daud Shah',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Karak')->first()->id,
                    'title' => 'Karak',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Karak')->first()->id,
                    'title' => 'Takht-E-Nasrati',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Kohat')->first()->id,
                    'title' => 'Kohat',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Kohat')->first()->id,
                    'title' => 'Lachi',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Buner')->first()->id,
                    'title' => 'Daggar (Buner)',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Buner')->first()->id,
                    'title' => 'Gagra',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Buner')->first()->id,
                    'title' => 'Khadokhail',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Buner')->first()->id,
                    'title' => 'Mandar',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Chitral')->first()->id,
                    'title' => 'Chitral',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Chitral')->first()->id,
                    'title' => 'Mastuj',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Lower Dir')->first()->id,
                    'title' => 'Adenzai',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Lower Dir')->first()->id,
                    'title' => 'Lal Qila',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Lower Dir')->first()->id,
                    'title' => 'Samarbagh (Barwa)',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Lower Dir')->first()->id,
                    'title' => 'Temergara',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Malakand')->first()->id,
                    'title' => 'Sam Ranizai',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Malakand')->first()->id,
                    'title' => 'Swat Ranizai',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Shangla')->first()->id,
                    'title' => 'Alpuri',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Shangla')->first()->id,
                    'title' => 'Puran',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Swat')->first()->id,
                    'title' => 'Babuzai (Swat)',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Swat')->first()->id,
                    'title' => 'Barikot',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Swat')->first()->id,
                    'title' => 'Behrain',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Swat')->first()->id,
                    'title' => 'Charbagh',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Swat')->first()->id,
                    'title' => 'Kabal',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Swat')->first()->id,
                    'title' => 'Khwaza Khela',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Swat')->first()->id,
                    'title' => 'Matta Shamzai',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Upper Dir')->first()->id,
                    'title' => 'Dir',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Upper Dir')->first()->id,
                    'title' => 'Sharingal',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Upper Dir')->first()->id,
                    'title' => 'Wari',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Mardan')->first()->id,
                    'title' => 'Katlang',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Mardan')->first()->id,
                    'title' => 'Mardan',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Mardan')->first()->id,
                    'title' => 'Takht Bhai',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Swabi')->first()->id,
                    'title' => 'Lahor',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Swabi')->first()->id,
                    'title' => 'Razar',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Swabi')->first()->id,
                    'title' => 'Topi',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Charsadda')->first()->id,
                    'title' => 'Charsadda',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Charsadda')->first()->id,
                    'title' => 'Shabqadar',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Charsadda')->first()->id,
                    'title' => 'Tangi',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Nowshera')->first()->id,
                    'title' => 'Jahangira',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Nowshera')->first()->id,
                    'title' => 'Nowshera',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Nowshera')->first()->id,
                    'title' => 'Pabbi',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Peshawar')->first()->id,
                    'title' => 'Peshawar I',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Peshawar')->first()->id,
                    'title' => 'Peshawar II',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Peshawar')->first()->id,
                    'title' => 'Peshawar III',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'district_id' => District::where('title', 'Peshawar')->first()->id,
                    'title' => 'Peshawar IV',
                    'created_by' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            ];

        DB::table('tehsils')->insert($tehsils);

    }
}
