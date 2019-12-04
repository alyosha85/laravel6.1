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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::Resource('/company','CompanyController');
Route::get('companies','CompaniesController@index');
Route::get('companies/create','CompaniesController@create');
Route::post('companies','CompaniesController@store');
Route::get('companies/{company}','CompaniesController@show');
Route::get('companies/{company}/edit','CompaniesController@edit'); 
Route::patch('companies/{company}','CompaniesController@update');






Route::Resource('/contact','ContactController');

