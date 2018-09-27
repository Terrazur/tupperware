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
Route::resource('/prof', 'UserController');
Route::resource('/order', 'OrderController');
Route::resource('/topup', 'TopUpController');
Route::resource('/template', 'TemplateController');

Auth::routes();

Route::get('/', function(){
	if(Auth::check()){
		return redirect('home');
	}
	else{
		return view('home');
	}
});

Route::get('/home', 'HomeController@index');
Route::post('/orderVerify', 'OrderController@verify');
Route::post('/topVerif', 'TopUpController@verify');
Route::post('/updateStatus', 'ProductionController@updateStatus');
Route::post('/verifyOrder', 'ProductionController@verifyOrder');