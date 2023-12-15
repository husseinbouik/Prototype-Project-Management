<?php
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\MemberController;
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


// Members Routes
Route::prefix('members')->group(function () {
    Route::get('/', [MemberController::class, 'index'])->name('members.index');
    Route::get('/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('/', [MemberController::class, 'store'])->name('members.store');
    Route::get('/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::post('/{member}', [MemberController::class, 'update'])->name('members.update');
    Route::delete('/{member}', [MemberController::class, 'destroy'])->name('members.destroy');
});

});




