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

Route::get('/', function () {
    return view('dashboard.home');
});

Route::get('/transtype', 'App\Http\Controllers\transtypeController@index');
Route::post('/transtype/store','App\Http\Controllers\transtypeController@store');
Route::get('/transtype/edit/{id}','App\Http\Controllers\transtypeController@edit');
Route::post('/transtype/update','App\Http\Controllers\transtypeController@update');
Route::get('/transtype/delete/{id}', 'App\Http\Controllers\transtypeController@delete');
Route::get('/transtype/deletepermanen/{id}', 'App\Http\Controllers\transtypeController@deletepermanen');
Route::get('/transtype/restore', 'App\Http\Controllers\transtypeController@restore');
Route::get('/transtype/restore/{id}', 'App\Http\Controllers\transtypeController@back');

Route::get('/company', 'App\Http\Controllers\companyController@index');
Route::post('/company/store','App\Http\Controllers\companyController@store');
Route::get('/company/edit/{id}','App\Http\Controllers\companyController@edit');
Route::post('/company/update','App\Http\Controllers\companyController@update');
Route::get('/company/delete/{id}', 'App\Http\Controllers\companyController@delete');
Route::get('/company/restore', 'App\Http\Controllers\companyController@restore');
Route::get('/company/restore/{id}', 'App\Http\Controllers\companyController@back');