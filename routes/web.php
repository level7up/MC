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

Route::get('/', 'AdminController@index' );




Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin-login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin-login-submit');
    Route::get('/', 'AdminController@index')->name('admin-dashboard');
    // Route::resource('companies', 'CompaniesController');
    // Companies
    Route::get('companies', 'CompaniesController@index')->name('companies');
    Route::get('company/create', 'CompaniesController@create')->name('create-company');
    Route::post('company', 'CompaniesController@store')->name('store-company');
    Route::delete('company/{id}', 'CompaniesController@destroy')->name('delete-company');
    Route::get('company/{id}', 'CompaniesController@edit')->name('edit-company');
    Route::put('company/{id}', 'CompaniesController@update')->name('update-company');

    // Employees
    Route::get('employees', 'EmployeesController@index')->name('employees');
    Route::get('employee/create', 'EmployeesController@create')->name('create-employee');
    Route::post('employee', 'EmployeesController@store')->name('store-employee');
    Route::delete('employee/{id}', 'EmployeesController@destroy')->name('delete-employee');
    Route::get('employee/{id}', 'EmployeesController@edit')->name('edit-employee');
    Route::put('employee/{id}', 'EmployeesController@update')->name('update-employee');

});

Route::get('send/{id}', 'NotificationController@sendNotification')->name('notification');
Route::get('send/', 'NotificationController@sendNotificationForm')->name('notification-form');


