<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GeneralSetting;
use App\Models\Account;
class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSetting::create([
            'key'=>'site_title',
            'value'=>'Funeral Service Fund'
        ]);
        GeneralSetting::create([
            'key'=>'short_title',
            'value'=>'FSF'
        ]);
        GeneralSetting::create([
            'key'=>'copyrights',
            'value'=>'All Rights Reserved'
        ]);
        Account::create([
            'code'=>'001',
            'name'=>'Cash',
            'account_number'=>'001',
            'bank'=>'Cash',
            'city'=>'Cash',
            'balance'=>0,
            'status'=>1
        ]);
        Account::create([
            'code'=>'002',
            'name'=>'Bank',
            'account_number'=>'002',
            'bank'=>'Bank',
            'city'=>'Bank',
            'balance'=>0,
            'status'=>1
        ]);
    }
}
