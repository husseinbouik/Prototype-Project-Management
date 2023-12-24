<?php
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MemberController;
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
Route::get('/home', [App\Http\Controllers\ProjectController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Members Routes
    Route::resource('members', MemberController::class);

    // Projects Routes
    Route::resource('projects', ProjectController::class);

    // Tasks Routes
    Route::resource('tasks', TaskController::class);


});







