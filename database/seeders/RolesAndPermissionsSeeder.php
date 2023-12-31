<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // Add this line
use Spatie\Permission\Models\Permission; // Add this line
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

 // Create roles
    $adminRole = Role::create(['name' => 'leader']);
    $memberRole = Role::create(['name' => 'member']);

    // Create permissions
    $manageMemberPermission = Permission::create(['name' => 'manage users']);
    $manageProjectPermission = Permission::create(['name' => 'manage projects']);
    $manageTaskPermission = Permission::create(['name' => 'manage tasks']);
    $viewTaskPermission = Permission::create(['name' => 'view tasks']);
    $viewProjectPermission = Permission::create(['name' => 'view projects']);
    $exportTaskPermission = Permission::create(['name' => 'export tasks']);
    $exportProjectPermission = Permission::create(['name' => 'export projects']);
    $importTaskPermission = Permission::create(['name' => 'import tasks']);
    $importProjectPermission = Permission::create(['name' => 'import projects']);
    $manageUserPermission = Permission::create(['name' => 'manage users']);
    $exportUserPermission = Permission::create(['name' => 'export users']); // Add this line
    $importUserPermission = Permission::create(['name' => 'import users']); // Add this line

    // Assign permissions to roles
    $adminRole->givePermissionTo($manageMemberPermission, $manageProjectPermission, $manageTaskPermission, $exportTaskPermission, $importTaskPermission, $importProjectPermission, $exportProjectPermission, $manageUserPermission, $exportUserPermission, $importUserPermission); // Add $exportUserPermission and $importUserPermission here
    $memberRole->givePermissionTo($viewTaskPermission, $viewProjectPermission);

        // You can assign roles to users here if needed
        // For example:
        // $user = \App\Models\User::find(1);
        // $user->assignRole('admin');
    }
}
