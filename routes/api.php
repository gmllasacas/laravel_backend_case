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

Route::post('/auth/login', 'App\Http\Controllers\AuthController@login')->name('auth.login');

Route::post('/user/register', 'App\Http\Controllers\UserController@store')->middleware(['auth:sanctum', 'abilities:user:create']);
Route::get('/user', 'App\Http\Controllers\UserController@show')->middleware(['auth:sanctum', 'abilities:user:get']);

Route::get('/employees', 'App\Http\Controllers\EmployeeController@list')->middleware(['auth:sanctum', 'abilities:employee:list'])->name('employees.list');
Route::get('/employees/{employee}', 'App\Http\Controllers\EmployeeController@get')->middleware(['auth:sanctum', 'abilities:employee:get']);
Route::post('/employees', 'App\Http\Controllers\EmployeeController@store')->middleware(['auth:sanctum', 'abilities:employee:create']);
Route::patch('/employees/{employee}', 'App\Http\Controllers\EmployeeController@update')->middleware(['auth:sanctum', 'abilities:employee:update']);
Route::delete('/employees/{employee}', 'App\Http\Controllers\EmployeeController@destroy')->middleware(['auth:sanctum', 'abilities:employee:delete']);
