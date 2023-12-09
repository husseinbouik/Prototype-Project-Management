<?php
use App\Http\Controllers\ProjectController;

use Illuminate\Support\Facades\Route;


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


// Tasks Routes
Route::prefix('tasks')->group(function () {
    Route::get('/', function () {
        return view('tasks.index');
    })->name('tasks.index');

    Route::get('/create', function () {
        return view('tasks.create');
    })->name('tasks.create');

    Route::get('/edit', function () {
        return view('tasks.edit');
    })->name('tasks.edit');
});

// Projects Routes
Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/{project}', [ProjectController::class, 'show'])->name('projects.show');
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

// Authentication Routes
Route::get('login', function () {
    return view('auth.login');
})->name('login');

// Welcome Page or Dashboard
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

