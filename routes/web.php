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



Route::group(['middleware' => 'auth'], function () {
    Route::get('/home','EconomieController@index')->name('economie');
    Route::post('/add_money','EconomieController@addMoney')->name('add_money');
    Route::post('/remove_money','EconomieController@addMoney')->name('remove_money');
    Route::get('show','EconomieController@show')->name('show');

});
