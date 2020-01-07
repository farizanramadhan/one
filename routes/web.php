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

Route::get('dashboard', function () {
    return view('dashboard');
});


Route::get('details', function () {
    return view('details');
});



Route::group(['middleware' => ['auth']], function() {
    Route::resource('customer','CustomerController');
    Route::resource('user','UserController');
    Route::resource('kavling','KavlingController');
    Route::resource('order','OrderController');
    Route::resource('program','ProgramController');
    Route::resource('project','ProjectController');
    Route::resource('status','StatusController');

});

Auth::routes();

 Route::get('/', 'HomeController@index')->name('home');
/* Route::get('/', 'HomeController@index')->name('home'); */
