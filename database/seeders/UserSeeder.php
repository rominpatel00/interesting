<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
          
            'username' => 'admin',
            'role' => 1,          
            'email' => 'admin@gmail.com',
            'mobile' => '8200741500',
            'belongs' => 'Home',
            'refference' => 'Self',
            'user_type' => '1',
            'comment' => 'Not needed',
            'password' => Hash::make('password'),
        ]);

    }
}

