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

Route::get('/useractive/{id}', 'AdminCmsUsersController@useractive'); 
Route::get('/userdeactive/{id}', 'AdminCmsUsersController@userdeactive'); 
Route::post('/reject/', 'SystemController@reject'); 

//ajax request
Route::get('/checkVenue/{value}', 'SystemController@checkVenue'); 