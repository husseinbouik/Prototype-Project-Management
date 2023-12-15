<?php
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// use App\Models\User;

// // Create a new user instance
// $user = new User();

// // Assign values to fillable properties
// $user->first_name = 'Project leader';
// $user->last_name = 'Project leader';
// $user->email = 'ProjectLeader@gmail.com';
// $user->password = bcrypt('admin'); // Remember to hash the password
// $user->role =  'member';
// // Save the user to the database
// $user->save();

// Authentication Routes
Route::get('login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('Auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {


// Tasks Routes
Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/{tasks}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/{tasks}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/{tasks}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});


// Projects Routes
Route::prefix('')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});


// Members Routes
Route::prefix('members')->group(function () {
    Route::get('/', function () {
        return view('members.index');
    })->name('members.index');

    Route::get('/create', function () {
        return view('members.create');
    })->name('members.create');

    Route::get('/edit', function () {
        return view('members.edit');
    })->name('members.edit');
});
});




