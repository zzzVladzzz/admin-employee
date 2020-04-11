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


Route::get('/invalid', 'VerifiedUserController@invalidAccount')->name('time-is-out');
Auth::routes();
Route::resource('/employee', 'EmployeeController')->middleware(['auth', 'administrator']);
Route::get('/', 'HomeController@index')->name('home');
Route::get('/detail-view-manager/{user}', 'HomeController@detailViewManager')->name('detail-view-manager');
