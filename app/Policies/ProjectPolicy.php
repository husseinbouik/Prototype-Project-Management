<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Add your code logic here

        return true; // Replace with your desired return value
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Project $project): bool
    {
        // Add your code logic here

        return true; // Replace with your desired return value
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Add your code logic here

        return $user->role === 'leader';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Project $project): bool
    {
        // Add your code logic here
        return $user->role === 'leader';

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Project $project): bool
    {
        // Add your code logic here

        return $user->role === 'leader';
            
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Project $project): bool
    {
        // Add your code logic here
        return $user->role === 'leader';

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Project $project): bool
    {
        // Add your code logic here

        return $user->role === 'leader';

    }
 
}
