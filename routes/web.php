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

Route::get('/','CompaniesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::Resource('/companies','CompaniesController');

Route::get('/contact/company/create/{company_id}','ContactController@create');
Route::Resource('/contact','ContactController');


Route::get('/communication/company/create/{company_id}','CommunicationController@create');
Route::Resource('/communication','CommunicationController');








