<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Auth::logout();
    return view('login');
});
Route::get('/login', function () { 
    Auth::logout(); 
    return view('login');
})->name('login');
Route::get('/logout', function () {
    Auth::logout(); 
    return view('login');    
})->name('logout')->middleware('auth');

Route::get('/employees', 'App\Http\Controllers\EmployeeController@index')->name('employees.index')->middleware('auth');
Route::get('/employees/filtered', 'App\Http\Controllers\EmployeeController@filtered')->name('employees.filtered')->middleware('auth');
