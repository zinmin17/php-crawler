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


Route::get('zalora', ['as' => 'zalora_home', 'uses' => 'Zalora\home@showHome']);

Route::get('test/facade', ['as' => 'test_facade', 'uses' => 'Test\facade@index']);


Route::get('exchange/', ['as' => 'exchange', 'uses' => 'Exchange\Crawler@index']);