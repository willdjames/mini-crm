<?php

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

/**
 * Root routes
 */
Route::get('/', 'RootController@index');

Route::get('/language/{lang}', 'LanguageController@chooser');


/**
 * Comapnies routes
 */
Route::group(['prefix' => 'companies'], function() {
    
    Route::get('/', 'CompaniesController@index');

    Route::get('/detail/{id}', 'CompaniesController@show');

    Route::get('/c', 'CompaniesController@create');

    Route::post('/c', 'CompaniesController@store');

    Route::get('/u/{id}/edit', 'CompaniesController@edit');

    Route::put('/u/{id}/edit', 'CompaniesController@update');

    Route::get('/d/{id}', 'CompaniesController@destroy');

});

/**
 * Employees routes
 */
Route::group(['prefix' => 'employees'], function() {
    
    Route::get('/', 'EmployeesController@index');

    Route::get('/c', 'EmployeesController@create');

    Route::post('/c', 'EmployeesController@store');

    Route::get('/u/{id}/edit', 'EmployeesController@edit');

    Route::put('/u/{id}/edit', 'EmployeesController@update');

    Route::get('/d/{id}', 'EmployeesController@destroy');

});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
