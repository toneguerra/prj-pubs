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

//ROTAS ANO ATIVIDADE
Route::group(['as'=>'year.','prefix'=>'year','middleware'=>'auth'], function(){
	//Route::get('/',['as'=>'index', 'uses'=>'Year\YearController@index']);
	Route::get('create',['as'=>'create', 'uses'=>'Year\YearController@create']);
	Route::post('store',['as'=>'store', 'uses'=>'Year\YearController@store']);
});


Route::group(['as'=>'expense.', 'prefix'=>'expense', 'middleware'=>'auth'], function(){
    Route::get('/',['as'=>'index', 'uses'=>'Expense\ExpenseController@index']);
	Route::get('create',['as'=>'create', 'uses'=>'Expense\ExpenseController@create']);
	Route::post('store',['as'=>'store', 'uses'=>'Expense\ExpenseController@store']);
	Route::get('filtro',['as'=>'filtro', 'uses'=>'Expense\ExpenseController@filtro']);
    /*    Route::get('edit/{id}',['as'=>'edit', 'uses'=>'Status\StatusController@edit']);
        Route::post('update/{id}',['as'=>'update', 'uses'=>'Status\StatusController@update']);
        Route::get('destroy/{id}',['as'=>'destroy', 'uses'=>'Status\StatusController@destroy']);
    */
});

//ROTAS CATEGORIA TIPOS DE CONTAS
Route::group(['as'=>'expense.type.','prefix'=>'expense.type','middleware'=>'auth'], function(){
	Route::get('/',['as'=>'index', 'uses'=>'Expense\Type\ExpenseTypeController@index']);
});



//ROTAS PERÍODOS DAS CONTAS
Route::group(['as'=>'expense.period.','prefix'=>'expense.period','middleware'=>'auth'], function(){
	Route::get('/',['as'=>'index', 'uses'=>'Expense\Period\ExpensePeriodController@index']);
});

//ROTAS RELATÓRIOS DOS SEGMENTOS
Route::group(['as'=>'expense.segment.','prefix'=>'expense_segment','middleware'=>'auth'], function(){
	Route::get('/',['as'=>'index', 'uses'=>'Expense\Segment\ExpenseSegmentController@index']);
	Route::get('create',['as'=>'create', 'uses'=>'Expense\Segment\ExpenseSegmentController@create']);
	Route::post('store',['as'=>'store', 'uses'=>'Expense\Segment\ExpenseSegmentController@store']);
});


Auth::routes();

Route::get('/home', 'HomeController@index');
