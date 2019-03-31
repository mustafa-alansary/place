<?php

use App\Place;

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
 
	$rest_times = Place::with('sitting','description')->paginate(5);
    
     return view('welcome',compact('rest_times'));



});

Auth::routes();

Route::resource('/place','PlaceController')->middleware('auth');
Route::resource('/time','TimeController')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
