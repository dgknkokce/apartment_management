<?php

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

Auth::routes();

//Route::get('/records', [App\Http\Controllers\DueController::class, 'showRecords']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/registers', 'App\Http\Controllers\RegisterController');
Route::get('/about', function()
{
    return View::make('about');
});
Route::get('/admin', [App\Http\Controllers\UserController::class, 'index'])->name('admin');
//Route::resource('/expenses/create', 'App\Http\Controllers\ExpenseController');
Route::resource('/expenses', 'App\Http\Controllers\ExpenseController');
//Route::resource('/users/create', 'App\Http\Controllers\UserController');
Route::resource('/users', 'App\Http\Controllers\UserController');
//Route::resource('/users/{user}', 'App\Http\Controllers\UserController');
Route::resource('/dues', 'App\Http\Controllers\DueController');
Route::resource('/announcements', 'App\Http\Controllers\AnnouncementController');







