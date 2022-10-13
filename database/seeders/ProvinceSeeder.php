<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;
use App\Models\Community;
class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::create([
            'name'=>'Province 1',
            'community_id'=>1,
        ]);
        Province::create([
            'name'=>'Province 2',
            'community_id'=>2,
        ]);
        Province::create([
            'name'=>'Province 3',
            'community_id'=>3,
        ]);
        Community::create([
            'name'=>'Community 1',
            'country_id'=>1,
        ]);
        Community::create([
            'name'=>'Community 2',
            'country_id'=>1,
        ]);
        Community::create([
            'name'=>'Community 3',
            'country_id'=>1,
        ]);
    }
}
