<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name'=>'City 1',
            'province_id'=>1,
            'office_id'=>1,
            'hod'=>1,
        ]);
        City::create([
            'name'=>'City 2',
            'province_id'=>2,
            'office_id'=>2,
            'hod'=>1,
        ]);

        
    }
}
