<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('roles')->delete();
        
        DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'leader',
                'guard_name' => 'web',
                'created_at' => '2023-12-26 06:19:54',
                'updated_at' => '2023-12-26 06:19:54',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'member',
                'guard_name' => 'web',
                'created_at' => '2023-12-26 06:19:54',
                'updated_at' => '2023-12-26 06:19:54',
            ),
        ));
        
        
    }
}