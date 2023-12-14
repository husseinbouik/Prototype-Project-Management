<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('projects')->delete();
        
        DB::table('projects')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'E-commerce Websites',
                'description' => '<p>Develop an online store for selling products</p>',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Blog Platform',
                'description' => 'Build a platform for creating and managing blogs',
                  'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Task Management App',
                'description' => 'Create an application for task tracking and management',
                  'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Social Media Platform',
                'description' => 'Build a platform for users to connect, share, and interact with content',
                  'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Portfolio Website',
                'description' => 'Create a personal or professional portfolio to showcase skills and work',
                  'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Event Management System',
                'description' => 'Develop a system for planning and organizing events and conferences',
                  'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'E-learning Platform',
                'description' => 'Design an online platform for delivering educational courses and content',
                  'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Inventory Management System',
                'description' => 'Build a system for tracking and managing product inventory',
                  'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Travel Booking Website',
                'description' => 'Create a website for users to search, book, and manage travel reservations',
                  'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
        ));
        
        
    }
}