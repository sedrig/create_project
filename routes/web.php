<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\Project\ProjectController;
use App\Http\Controllers\Auth\Task\TaskController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('home');

Route::prefix('/authenticate')->group(function () {

    Route::resource('project', ProjectController::class);
    Route::get('task/create/{id}', [TaskController::class, 'create'])->name('task_create');
    Route::get('task/status/{pid}/{sid}', [TaskController::class, 'status'])->name('status_project');
    Route::get('task/with_project/{id}', [TaskController::class, 'popular'])->name('with_project');
    Route::resource('task', TaskController::class);


    Route::get('auth/project', [AuthController::class, 'index'])->name('project');
});

Route::post('/register', [MainController::class, 'register'])->name('register');

Route::post('/login', [MainController::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('auth.register');
});
