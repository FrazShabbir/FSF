<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     if(! User::find(1)){
            $user = new User();
            $user->full_name = 'Fraz Shabbir';
    
            $user->username = 'FrazShabbir';
            $user->status = 1;
            $user->password = bcrypt('admin');
            $user->email = 'fraz.shabbir54@gmail.com';
            $user->email_verified_at = now();
            // $user->ar_user = true;
            $user->assignRole('Super Admin');
            $user->save();
         }

    }

}
