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
Route::get('index','API_testController@Index')->name('api_testcontroller.index');
Route::get('show/{id}','API_testController@Single')->name('api_testcontroller.show');
Route::get('add','API_testController@Add')->name('api_testcontroller.add');
Route::post('store','API_testController@Store')->name('api_testcontroller.store');
Route::get('update/{id}','API_testController@Origin')->name('api_testcontroller.update');
Route::post('renew','API_testController@Renew')->name('api_testcontroller.renew');
Route::get('delete/{id}','API_testController@Del')->name('api_testcontroller.delete');