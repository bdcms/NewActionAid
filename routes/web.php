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
Route::post('/CNreject/', 'SystemController@CNreject'); 


Route::get('/lmApprove/{cNid}', 'SystemController@is_LineManagerApprove'); 
Route::post('/meApprove/', 'SystemController@is_MEOfficerApprove'); 
Route::get('/headApprove/{cNid}/{userId}', 'SystemController@is_HeadOfficerApprove'); 

//ajax request
Route::get('/checkVenue/{value}', 'SystemController@checkVenue'); 
Route::get('admin/ai_activity_report/getDataTable1/{fk_value}', 'SystemController@getDataTable1'); 

//pdf request
Route::get('/makePDF/{id}','SystemController@makePDF');
Route::get('/makeCnPDF/{id}','SystemController@makeCnPDF');