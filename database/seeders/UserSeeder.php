<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'amin sharifi',
            'email' =>'bigm@bigm.test',
            'is_admin'=>1,
            'email_verified_at'=> date(DATE_ATOM),
            'password' => Hash::make('password'),
        ]);

    }
}
