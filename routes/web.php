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
    return redirect('/home');
});
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/registration/{id}','RegistrationController@register')->middleware('verified');
Route::post('/register/{id}','RegistrationController@post_register')->middleware('verified');
Route::post('/register/{id}/image','DocumentUploadController@image')->middleware('verified');
Route::post('/register/{id}/signature','DocumentUploadController@signature')->middleware('verified');
Route::post('/register/{id}/10th-marksheet','DocumentUploadController@marksheet_10')->middleware('verified');
Route::post('/register/{id}/12th-marksheet','DocumentUploadController@marksheet_12')->middleware('verified');
Route::post('/register/{id}/community-cert','DocumentUploadController@community_cert')->middleware('verified');
Route::post('/register/{id}/change-payment','RegistrationController@change_payment')->middleware('verified');
Route::get('/register/{id}/payment/challan/download','RegistrationController@download_challan')->middleware('verified');
Route::get('/register/{id}/application/download','RegistrationController@download_application')->middleware('verified');
Route::get('/register/{id}/check','RegistrationController@check')->middleware('verified');