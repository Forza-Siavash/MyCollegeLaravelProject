<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Auth;
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



Route::get('/', function () {
    return view('welcome');
});

//Tasks routes
Route::get('/tasks/create', [App\Http\Controllers\TasksController::class, 'create'])->name('createTask')->middleware('auth');
Route::get('/tasks', [App\Http\Controllers\TasksController::class, 'index'])->name('tasks')->middleware('auth');
Route::get('/tasks/{task}', [App\Http\Controllers\TasksController::class, 'show'])->name('showTask');
Route::get('/tasks/edit/{task}', [App\Http\Controllers\TasksController::class, 'edit'])->name('editTask')->middleware('auth');
Route::get('/tasks/destroy/{task}', [App\Http\Controllers\TasksController::class, 'destroy'])->name('destroyTask')->middleware('auth');

Route::post('/tasks/store', [App\Http\Controllers\TasksController::class, 'store'])->name('storeTask');
Route::put('/tasks/update/{task}', [App\Http\Controllers\TasksController::class, 'update'])->name('updateTask');


//Users routes
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users')->middleware('IsAdminMiddleware');
Route::get('/users/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('editUser')->middleware('IsAdminMiddleware');
Route::get('/users/destroy/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroyUser')->middleware('IsAdminMiddleware');

Route::put('/users/update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('updateUser');

//Category routes
Route::get('/categories/create', [CategoryController::class, 'create'])->name('create')->middleware('auth');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories')->middleware('auth');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('show');
Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('edit')->middleware('auth');
Route::get('/categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('destroy')->middleware('auth');

Route::post('/categories/store', [CategoryController::class, 'store'])->name('store');
Route::put('/categories/update/{category}', [CategoryController::class, 'update'])->name('update');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
