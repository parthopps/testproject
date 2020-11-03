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
Route::get('/home/all','HomeController@allData');
Route::post('/pps/search/','HomeController@searchuser');
Route::post('/store/licence/','HomeController@licencestore')->name('check.licence.store');
Route::post('/store/user/','HomeController@userupdate')->name('user.licence.upadate');

Route::get('/success/user/active/{id}' ,'HomeController@active')->name('activecode');
Route::post('/store/user/update2','HomeController@userupdate2')->name('user.licence.upadate2');
Route::get('/congratulation/user/activation/{id}' ,'HomeController@congratulations')->name('congratulation');




