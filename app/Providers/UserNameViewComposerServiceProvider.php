<?php 
// app/Providers/UserNameViewComposerServiceProvider.php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class UserNameViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Using a composer to share the username across all views
        View::composer('*', function ($view) {
            // Retrieve the authenticated user's name
            $userName = Auth::check() ? Auth::user()->first_name . ' ' . Auth::user()->last_name : null;

            // Share the 'userName' variable with all views
            $view->with('userName', $userName);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
?>