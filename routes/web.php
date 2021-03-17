<?php

use App\Http\Controllers\Admin\AdminController;
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

    Route::get('/download/{tasks}', [TaskController::class, 'download'])->name('download');
    Route::resource('project', ProjectController::class);
    Route::get('task/edit/{pid}/{sid}', [TaskController::class, 'edit'])->name('task_edit');
    Route::get('task/create/{id}', [TaskController::class, 'create'])->name('task_create');
    Route::get('task/status/{pid}/{sid}', [TaskController::class, 'status'])->name('status_project');
    Route::get('task/with_project/{id}', [TaskController::class, 'popular'])->name('with_project');
    Route::resource('task', TaskController::class);


    Route::get('auth/project', [AuthController::class, 'index'])->name('project');
});

Route::get('locale/{locale}', [MainController::class, 'locale'])->name('locale');

Route::get('/login_form', [MainController::class, 'login_form'])->name('login_form');

Route::get('/register_form', [MainController::class, 'register_form'])->name('register_form');

Route::post('/register', [MainController::class, 'register'])->name('register');

Route::post('/login', [MainController::class, 'login'])->name('login');

Route::get('/logout', [MainController::class, 'logout'])->name('logout');

Route::get('/users_show', [AdminController::class, 'show'])->name('show_users');
