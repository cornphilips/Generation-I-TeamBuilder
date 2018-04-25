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

Route::get('/', 'ListController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/edit/{id}', 'ListController@edit');

Route::post('/update/{id}', 'ListController@update');

Route::resource('users', 'ListController@update');

Route::get('search', 'ListController@search');

//Route::get('/ui', function () {
//    return view('testui');
//});

Route::get('/ui/{id}', 'TEAMController@getTeam');

//Noahs stuff

Route::post('/team/{id}', 'TEAMController@update');

Route::resource('team', 'TEAMController');

//Route::get('/delete/{id}', 'ListController@destroy');

//Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
//    return "this page requires that you be logged in and an Admin";
//}]);

Route::get('/delete/{id}', ['uses' => 'ListController@destroy', 'middleware' => ['auth', 'admin']]);

Route::get('/fuckedup', function() {
    return "this page requires that you be logged in and an Admin";
});
