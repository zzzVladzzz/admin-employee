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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', 'HomeController@main')->name('main');

Route::get('/invalid', 'VerifiedUserController@invalidAccount')->name('time-is-out');
//Route::middleware('timeIsOut')
Auth::routes();
Route::resource('/employee', 'EmployeeController');
Route::get('/', 'HomeController@index')->name('home');
