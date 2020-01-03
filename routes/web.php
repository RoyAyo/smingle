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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile','ProfileController@index')->name('profile');
Route::post('/profile/{id}','ProfileController@update')->name('profile.update');


Route::get('/student','StudentsController@index')->name('student');
Route::post('/student/{id}','StudentsController@update')->name('student.update');

Route::get('/filter','FiltersController@index')->name('filter');
Route::post('/filter/{id}','FiltersController@store')->name('filter.store');

Route::get('/about','AboutController@index')->name('about');

Route::get('general','GeneralsController@index')->name('general');
Route::post('/general/{id}','GeneralsController@store')->name('general.store');

Route::get('test','TestController@index')->name('test');

Route::get('/cluster','ClustersController@index')->name('cluster');
Route::post('/cluster','ClustersController@store')->name('cluster.store');

Route::post('/comp','CompsController@check')->name('comp.check');

Route::get('/match','MatchesController@check')->name('match.check');

Route::get('/messages','MessagesController@index')->name('messages');
Route::get('/message/{id}','MessagesController@message')->name('message');
Route::post('/message/{id}','MessagesController@store')->name('message.store');

Route::get('/user/{id}','UsersController@index')->name('user');

Route::get('anon','AnonsController@index')->name('anon');
Route::post('anon','AnonsController@create')->name('anon.create');

Route::get('event','EventsController@index')->name('events');
Route::get('event/{id}','EventsController@view')->name('event');
Route::post('event/store','EventsController@store')->name('event.store');
Route::get('createvent','EventsController@create')->name('event.create');

Route::get('adminevent','AdminsController@index')->name('adminevent');