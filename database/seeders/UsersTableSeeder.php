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
        $now = now();

        DB::table('users')->insert([
            'first_name' => 'Project ',
            'last_name' => ' leader',
            'email' => 'ProjectLeader@gmail.com',
            'password' => Hash::make('leader123'),
            'role' => 'leader',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('users')->insert([
            'first_name' => 'Member ',
            'last_name' => ' 1',
            'email' => 'member@gmail.com',
            'password' => Hash::make('member123'),
            'role' => 'member',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
       }
}
