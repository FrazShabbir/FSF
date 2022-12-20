<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Office;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    

        Office::create([
            'office_code'=>'002',
            'name'=>'Head Office',
            'phone'=>'9898989898',
            'city_id'=>'1',
            'area'=>'Area',
            'street'=>'Street 1',
            'officehead'=>1,
        ]);
        Office::create([
            'office_code'=>'0022',

            'name'=>'State Office',
            'phone'=>'1212121',
            'city_id'=>'2',
            'area'=>'Area 2',
            'street'=>'Street 1',
            'officehead'=>1,
        ]);
        

    }
}
