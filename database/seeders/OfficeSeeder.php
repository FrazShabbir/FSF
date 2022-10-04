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
            'name'=>'Head Office',
            'phone'=>'9898989898',
            'state'=>'State',
            'city'=>'City',
            'area'=>'Area',
            'street'=>'Street 1',
            'officehead'=>1,
        ]);
        Office::create([
            'name'=>'State Office',
            'phone'=>'1212121',
            'state'=>'State 2',
            'city'=>'City 2',
            'area'=>'Area 2',
            'street'=>'Street 1',
            'officehead'=>1,
        ]);
        

    }
}
