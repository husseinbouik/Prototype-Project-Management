<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => 'Project ',
            'last_name' => ' leader',
            'email' => 'ProjectLeader@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'member',
        ]);
        DB::table('users')->insert([
            'first_name' => 'solicoder',
            'last_name' => '2024',
            'email' => 'member@gmail.com',
            'password' => Hash::make('member123'),
            'role' => 'member',
        ]);
       }
}
