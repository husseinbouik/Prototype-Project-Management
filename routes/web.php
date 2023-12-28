<?php
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
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

// Authentication Routes
Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post'); // Change AuthController to LoginController
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::middleware(['auth'])->group(function () {
// });
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index')->middleware('can:view projects');
    // Projects Routes
    Route::prefix('projects')->middleware('can:manage projects')->group(function () {
        Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/{projects}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::post('/{projects}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/{projects}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    });

    // Tasks Routes with authorization
    Route::prefix('tasks')->middleware('can:view tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    });
        // Tasks Routes with authorization
        Route::prefix('tasks')->middleware('can:manage tasks')->group(function () {
            Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
            Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
            Route::get('/{tasks}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
            Route::delete('/{tasks}', [TaskController::class, 'destroy'])->name('tasks.destroy');
        });

    // Users Routes
    Route::prefix('users')->middleware('can:manage users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

});







