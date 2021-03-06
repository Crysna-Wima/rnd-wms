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

Route::get('/stockstatus', 'App\Http\Controllers\stockstatusController@index');
Route::post('/stockstatus/store','App\Http\Controllers\stockstatusController@store');
Route::get('/stockstatus/edit/{id}','App\Http\Controllers\stockstatusController@edit');
Route::post('/stockstatus/update','App\Http\Controllers\stockstatusController@update');
Route::get('/stockstatus/delete/{id}', 'App\Http\Controllers\stockstatusController@delete');
Route::get('/stockstatus/deletepermanen/{id}', 'App\Http\Controllers\stockstatusController@deletepermanen');
Route::get('/stockstatus/restore', 'App\Http\Controllers\stockstatusController@restore');
Route::get('/stockstatus/restore/{id}', 'App\Http\Controllers\stockstatusController@back');

Route::get('/uom', 'App\Http\Controllers\uomController@index');
Route::post('/uom/store','App\Http\Controllers\uomController@store');
Route::get('/uom/edit/{id}','App\Http\Controllers\uomController@edit');
Route::post('/uom/update','App\Http\Controllers\uomController@update');
Route::get('/uom/delete/{id}', 'App\Http\Controllers\uomController@delete');
Route::get('/uom/deletepermanen/{id}', 'App\Http\Controllers\uomController@deletepermanen');
Route::get('/uom/restore', 'App\Http\Controllers\uomController@restore');
Route::get('/uom/restore/{id}', 'App\Http\Controllers\uomController@back');

Route::get('/materialgroup', 'App\Http\Controllers\materialgroupController@index');
Route::post('/materialgroup/store','App\Http\Controllers\materialgroupController@store');
Route::get('/materialgroup/edit/{id}','App\Http\Controllers\materialgroupController@edit');
Route::post('/materialgroup/update','App\Http\Controllers\materialgroupController@update');
Route::get('/materialgroup/delete/{id}', 'App\Http\Controllers\materialgroupController@delete');
Route::get('/materialgroup/deletepermanen/{id}', 'App\Http\Controllers\materialgroupController@deletepermanen');
Route::get('/materialgroup/restore', 'App\Http\Controllers\materialgroupController@restore');
Route::get('/materialgroup/restore/{id}', 'App\Http\Controllers\materialgroupController@back');

Route::get('/company', 'App\Http\Controllers\companyController@index');
Route::post('/company/store','App\Http\Controllers\companyController@store');
Route::get('/company/edit/{id}','App\Http\Controllers\companyController@edit');
Route::post('/company/update','App\Http\Controllers\companyController@update');
Route::get('/company/delete/{id}', 'App\Http\Controllers\companyController@delete');
Route::get('/company/deletepermanen/{id}', 'App\Http\Controllers\companyController@deletepermanen');
Route::get('/company/restore', 'App\Http\Controllers\companyController@restore');
Route::get('/company/restore/{id}', 'App\Http\Controllers\companyController@back');

Route::get('/material', 'App\Http\Controllers\materialController@index');
Route::post('/material/store','App\Http\Controllers\materialController@store');
Route::get('/material/edit/{id}','App\Http\Controllers\materialController@edit');
Route::post('/material/update','App\Http\Controllers\materialController@update');
Route::get('/material/delete/{id}', 'App\Http\Controllers\materialController@delete');
Route::get('/material/deletepermanen/{id}', 'App\Http\Controllers\materialController@deletepermanen');
Route::get('/material/restore', 'App\Http\Controllers\materialController@restore');
Route::get('/material/restore/{id}', 'App\Http\Controllers\materialController@back');

Route::get('/warehouse', 'App\Http\Controllers\warehouseController@index');
Route::post('/warehouse/store','App\Http\Controllers\warehouseController@store');
Route::get('/warehouse/edit/{id}','App\Http\Controllers\warehouseController@edit');
Route::post('/warehouse/update','App\Http\Controllers\warehouseController@update');
Route::get('/warehouse/delete/{id}', 'App\Http\Controllers\warehouseController@delete');
Route::get('/warehouse/deletepermanen/{id}', 'App\Http\Controllers\warehouseController@deletepermanen');
Route::get('/warehouse/restore', 'App\Http\Controllers\warehouseController@restore');
Route::get('/warehouse/restore/{id}', 'App\Http\Controllers\warehouseController@back');

Route::get('/storagefacility', 'App\Http\Controllers\storagefacilityController@index');
Route::post('/storagefacility/store','App\Http\Controllers\storagefacilityController@store');
Route::get('/storagefacility/edit/{id}','App\Http\Controllers\storagefacilityController@edit');
Route::post('/storagefacility/update','App\Http\Controllers\storagefacilityController@update');
Route::get('/storagefacility/delete/{id}', 'App\Http\Controllers\storagefacilityController@delete');
Route::get('/storagefacility/deletepermanen/{id}', 'App\Http\Controllers\storagefacilityController@deletepermanen');
Route::get('/storagefacility/restore', 'App\Http\Controllers\storagefacilityController@restore');
Route::get('/storagefacility/restore/{id}', 'App\Http\Controllers\storagefacilityController@back');

Route::get('/storagebin', 'App\Http\Controllers\storagebinController@index');
Route::post('/storagebin/store','App\Http\Controllers\storagebinController@store');
Route::get('/storagebin/edit/{id}','App\Http\Controllers\storagebinController@edit');
Route::post('/storagebin/update','App\Http\Controllers\storagebinController@update');
Route::get('/storagebin/delete/{id}', 'App\Http\Controllers\storagebinController@delete');
Route::get('/storagebin/deletepermanen/{id}', 'App\Http\Controllers\storagebinController@deletepermanen');
Route::get('/storagebin/restore', 'App\Http\Controllers\storagebinController@restore');
Route::get('/storagebin/restore/{id}', 'App\Http\Controllers\storagebinController@back');

Route::get('/movement', 'App\Http\Controllers\movementController@index');
Route::post('/movement/store','App\Http\Controllers\movementController@store');
Route::get('/movement/edit/{id}','App\Http\Controllers\movementController@edit');
Route::post('/movement/update','App\Http\Controllers\movementController@update');
Route::get('/movement/delete/{id}', 'App\Http\Controllers\movementController@delete');
Route::get('/movement/deletepermanen/{id}', 'App\Http\Controllers\movementController@deletepermanen');
Route::get('/movement/restore', 'App\Http\Controllers\movementController@restore');
Route::get('/movement/restore/{id}', 'App\Http\Controllers\movementController@back');