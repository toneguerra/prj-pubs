<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['as'=>'expense.', 'prefix'=>'expense', 'middleware'=>'auth'], function(){
    Route::get('/',['as'=>'index', 'uses'=>'Expense\ExpenseController@index']);
    /*    Route::get('edit/{id}',['as'=>'edit', 'uses'=>'Status\StatusController@edit']);
        Route::post('update/{id}',['as'=>'update', 'uses'=>'Status\StatusController@update']);
        Route::get('destroy/{id}',['as'=>'destroy', 'uses'=>'Status\StatusController@destroy']);
    */
});

Route::group(['as'=>'expense.type.','prefix'=>'expense.type','middleware'=>'auth'], function(){
	Route::get('/',['as'=>'index', 'uses'=>'Expense\Auxiliar\ExpenseTypeController@index']);
});

Auth::routes();

Route::get('/home', 'HomeController@index');