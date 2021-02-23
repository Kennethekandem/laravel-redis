<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password')
        ]);


        DB::table('users')->insert([
            'name' => 'User 2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('password')
        ]);


        DB::table('users')->insert([
            'name' => 'User 3',
            'email' => 'user3@gmail.com',
            'password' => Hash::make('password')
        ]);


        DB::table('users')->insert([
            'name' => 'User 4',
            'email' => 'user4@gmail.com',
            'password' => Hash::make('password')
        ]);


        DB::table('users')->insert([
            'name' => 'User 5',
            'email' => 'user5@gmail.com',
            'password' => Hash::make('password')
        ]);


        DB::table('users')->insert([
            'name' => 'User 6',
            'email' => 'user6@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
