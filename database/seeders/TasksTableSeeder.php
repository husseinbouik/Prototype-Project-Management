<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TasksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('tasks')->delete();
        
        DB::table('tasks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'project_id' => 1,
                'name' => 'Design Product Pages',
                'description' => '<p>Create user-friendly product pages with images and descriptions</p>',
                                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            1 => 
            array (
                'id' => 2,
                'project_id' => 1,
                'name' => 'Implement Shopping Cart',
                'description' => 'Develop a functional shopping cart for users to add and manage items',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            2 => 
            array (
                'id' => 3,
                'project_id' => 1,
                'name' => 'Integrate Payment Gateway',
                'description' => 'Connect the website to a secure payment gateway for online transactions',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            3 => 
            array (
                'id' => 4,
                'project_id' => 2,
                'name' => 'User Authentication',
                'description' => 'Implement a secure user authentication system for bloggers',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            4 => 
            array (
                'id' => 5,
                'project_id' => 2,
                'name' => 'Create Blog Post Editor',
                'description' => 'Build a WYSIWYG editor for users to write and format blog posts',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            5 => 
            array (
                'id' => 6,
                'project_id' => 2,
                'name' => 'Implement Comments Section',
                'description' => 'Develop a comment system for users to interact with blog posts',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            6 => 
            array (
                'id' => 7,
                'project_id' => 3,
                'name' => 'Task CRUD Operations',
            'description' => 'Enable users to perform CRUD operations on tasks (Create, Read, Update, Delete)',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            7 => 
            array (
                'id' => 8,
                'project_id' => 3,
                'name' => 'User Roles and Permissions',
            'description' => 'Implement roles and permissions for different user levels (Admin, Member)',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            8 => 
            array (
                'id' => 9,
                'project_id' => 3,
                'name' => 'Task Filtering and Sorting',
                'description' => 'Add functionality to filter and sort tasks based on different criteria',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            9 => 
            array (
                'id' => 10,
                'project_id' => 4,
                'name' => 'User Profile Creation',
                'description' => 'Allow users to create and customize their profiles',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            10 => 
            array (
                'id' => 11,
                'project_id' => 4,
                'name' => 'Post Sharing Feature',
                'description' => 'Implement functionality for users to share posts and media content',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            11 => 
            array (
                'id' => 12,
                'project_id' => 4,
                'name' => 'Friend Request System',
                'description' => 'Develop a system for users to send and accept friend requests',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            12 => 
            array (
                'id' => 13,
                'project_id' => 5,
                'name' => 'Design Portfolio Layout',
                'description' => 'Create an appealing and responsive layout for the portfolio',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            13 => 
            array (
                'id' => 14,
                'project_id' => 5,
                'name' => 'Project Showcase Section',
                'description' => 'Build a section to showcase completed projects with details',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            14 => 
            array (
                'id' => 15,
                'project_id' => 5,
                'name' => 'Contact Form Integration',
                'description' => 'Implement a contact form for users to get in touch',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            15 => 
            array (
                'id' => 16,
                'project_id' => 6,
                'name' => 'Event Registration Module',
                'description' => 'Develop a module for users to register for events',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            16 => 
            array (
                'id' => 17,
                'project_id' => 6,
                'name' => 'Venue Management',
                'description' => 'Create a system for managing and booking event venues',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            17 => 
            array (
                'id' => 18,
                'project_id' => 6,
                'name' => 'Ticketing System',
                'description' => 'Implement a ticketing system for selling event tickets online',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            18 => 
            array (
                'id' => 19,
                'project_id' => 7,
                'name' => 'Course Creation Dashboard',
                'description' => 'Build a dashboard for instructors to create and manage courses',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            19 => 
            array (
                'id' => 20,
                'project_id' => 7,
                'name' => 'User Progress Tracking',
                'description' => 'Implement a system to track and display user progress in courses',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            20 => 
            array (
                'id' => 21,
                'project_id' => 7,
                'name' => 'Discussion Forum',
                'description' => 'Create a forum for students to discuss course-related topics',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            21 => 
            array (
                'id' => 22,
                'project_id' => 8,
                'name' => 'Product Catalog Management',
                'description' => 'Develop a system for managing the product catalog',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            22 => 
            array (
                'id' => 23,
                'project_id' => 8,
                'name' => 'Order Processing Workflow',
                'description' => 'Implement a workflow for processing and fulfilling customer orders',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            23 => 
            array (
                'id' => 24,
                'project_id' => 8,
                'name' => 'Inventory Replenishment Alerts',
                'description' => 'Set up alerts for low stock levels and inventory replenishment',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            24 => 
            array (
                'id' => 25,
                'project_id' => 9,
                'name' => 'Search and Filter Functionality',
                'description' => 'Enable users to search and filter travel options based on preferences',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            25 => 
            array (
                'id' => 26,
                'project_id' => 9,
                'name' => 'Booking and Reservation System',
                'description' => 'Implement a secure system for users to book flights, hotels, etc.',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
            26 => 
            array (
                'id' => 27,
                'project_id' => 9,
                'name' => 'User Account Dashboard',
                'description' => 'Create a dashboard for users to manage bookings and preferences',
                'start_date' => today(), // Set a start date without time
                'end_date' => today()->addMonths(3), // Set an end date if applicable
                'created_at' => now(),
                'updated_at' => '2023-12-09 07:55:08',
            ),
        ));
        
        
    }
}