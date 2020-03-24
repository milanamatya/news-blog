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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/news',function(){
	return view('frontend.news');
});

Route::get('/',function(){
	return view('frontend.news');
});



Route::group([ 'prefix' => 'api'], function(){
	Route::get('getNewsList','NewsController@index');
	Route::get('getNewsListSource/{sourceId}','NewsController@sourceIndex'); 
	Route::get('getNewsByCountry/{countryCode}','NewsController@countryIndex'); 


	Route::get('getSourceList','SourceController@index');
	
});
