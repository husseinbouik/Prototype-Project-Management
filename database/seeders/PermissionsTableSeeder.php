<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('permissions')->delete();
        
        DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'manage members',
                'guard_name' => 'web',
                'created_at' => '2023-12-26 06:19:54',
                'updated_at' => '2023-12-26 06:19:54',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'manage projects',
                'guard_name' => 'web',
                'created_at' => '2023-12-26 06:19:54',
                'updated_at' => '2023-12-26 06:19:54',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'manage tasks',
                'guard_name' => 'web',
                'created_at' => '2023-12-26 06:19:54',
                'updated_at' => '2023-12-26 06:19:54',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'view tasks',
                'guard_name' => 'web',
                'created_at' => '2023-12-26 06:19:54',
                'updated_at' => '2023-12-26 06:19:54',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'view projects',
                'guard_name' => 'web',
                'created_at' => '2023-12-26 06:19:54',
                'updated_at' => '2023-12-26 06:19:54',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'export tasks',
                'guard_name' => 'web',
                'created_at' => '2023-12-26 06:19:54',
                'updated_at' => '2023-12-26 06:19:54',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'export projects',
                'guard_name' => 'web',
                'created_at' => '2023-12-26 06:19:54',
                'updated_at' => '2023-12-26 06:19:54',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'import tasks',
                'guard_name' => 'web',
                'created_at' => '2023-12-26 06:19:54',
                'updated_at' => '2023-12-26 06:19:54',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'import projects',
                'guard_name' => 'web',
                'created_at' => '2023-12-26 06:19:54',
                'updated_at' => '2023-12-26 06:19:54',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'manage users',
                'guard_name' => 'web',
                'created_at' => '2023-12-26 06:19:54',
                'updated_at' => '2023-12-26 06:19:54',
            ),
        ));
        
        
    }
}