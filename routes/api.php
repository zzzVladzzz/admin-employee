<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/employees', 'API\EmployeeController@employees');
Route::middleware('auth:api')->get('/managers', 'API\EmployeeController@managers');
Route::middleware('auth:api')->get('/manager/{user}', 'API\EmployeeController@manager');
