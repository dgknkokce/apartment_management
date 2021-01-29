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
//Route::resource('/registers', 'App\Http\Controllers\RegisterController');

Auth::routes();

Route::get('/guide', function()
{
    return View::make('guide');
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\UserController::class, 'index'])->name('admin');
Route::resource('/expenses', 'App\Http\Controllers\ExpenseController');
Route::resource('/users', 'App\Http\Controllers\UserController');
Route::resource('/dues', 'App\Http\Controllers\DueController');
Route::resource('/announcements', 'App\Http\Controllers\AnnouncementController');
Route::resource('/apartments', 'App\Http\Controllers\ApartmentController');








