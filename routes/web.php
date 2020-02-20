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

Route::get('/', function(){
    // url has been moved
    return redirect('/dashboard');
});
Route::get('dashboard', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

    Route::get('user/updaterole/{id}','UserController@updateRole')->name('user.updaterole');
    Route::get('customer/getktp', 'CustomerController@getKtp')->name('customer.getKtp');
    Route::post('customer/getcity', 'CustomerController@getCity')->name('customer.getCity');
    Route::post('customer/getdistric', 'CustomerController@getDistric')->name('customer.getDistric');
    Route::post('customer/history/store', 'CustomerController@historyStore')->name('customer.history.store');
    Route::post('order/history/store', 'OrderController@historyStore')->name('order.history.store');
    Route::post('project/getkavling', 'ProjectController@getKavling')->name('project.getKavling');

    Route::resource('customer','CustomerController');
    Route::resource('user','UserController');
    Route::resource('kavling','KavlingController');
    Route::resource('customerjob','CustomerJobController');
    Route::resource('order','OrderController');
    Route::resource('program','ProgramController');
    Route::resource('project','ProjectController');
    Route::resource('status','StatusController');

});
Auth::routes();
