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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('employee', 'EmployeeController');
Route::resource('position', 'PositionController');
Route::resource('affiliation', 'AffiliationController');
Route::resource('location', 'LocationController');
Route::resource('employeefile', 'HealthexamfileController');
Route::get('employee-file/{id}', 'HealthexamfileController@create')->name('fileadd');
