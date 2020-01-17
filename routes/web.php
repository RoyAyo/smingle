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
// Route::post('/filter/{id}','FiltersController@store')->name('filter.store');

Route::get('/about','AboutController@index')->name('about');

Route::get('general','GeneralsController@index')->name('general');
Route::post('/general/{id}','GeneralsController@store')->name('general.store');

Route::get('test','TestController@index')->name('test');

Route::get('/cluster','ClustersController@index')->name('cluster');
Route::post('/cluster','ClustersController@store')->name('cluster.store');

Route::post('/comp','CompsController@check')->name('comp.check');

Route::post('/match','MatchesController@check')->name('match.check');


Route::get('/messages','MessagesController@index')->name('messages');
Route::get('/message/{id}','MessagesController@message')->name('message');
Route::post('/message/{id}','MessagesController@store')->name('message.store');

Route::get('/user/{id}','UsersController@index')->name('user');
Route::post('pp','UsersController@pics')->name('pics');

Route::get('anon','AnonsController@index')->name('anon');
Route::post('anon','AnonsController@create')->name('anon.create');

//groupby events
Route::get('events','EventsController@index')->name('events');
Route::get('events/event/{id}','EventsController@event')->name('event.id');
Route::post('events/event/attend/{id}','EventsController@attend')->name('event.attend');
Route::get('events/shows','EventsController@show')->name('event.show');
Route::get('events/parties','EventsController@party')->name('event.party');
Route::get('events/movies','EventsController@movie')->name('event.movie');
Route::post('events/storeshow','EventsController@storeshow')->name('event.storeshow');
Route::post('events/storeparty','EventsController@storeparty')->name('event.storeparty');
Route::post('events/storemovie','EventsController@storemovie')->name('event.storemovie');
Route::get('events/addshow','EventsController@createshow')->name('event.createshow');
Route::get('events/addparty','EventsController@createparty')->name('event.createparty');
Route::get('events/addmovie','EventsController@createmovie')->name('event.createmovie');
Route::get('events/suggest','EventsController@suggest')->name('event.suggest');
Route::get('events/notifications','EventsController@notifications')->name('event.notifications');
Route::post('events/suggest','EventsController@storesuggest')->name('event.storesuggest');
Route::get('events/privateshow/{id}','EventsController@privateshow')->name('event.privateshow');
Route::get('events/privateparty/{id}','EventsController@privatepart')->name('event.privateparty');
Route::get('events/admin','AdminsController@index')->name('adminevent');
Route::post('events/admin/verify/{id}','AdminsController@verify');

Route::get('/settings','SettingsController@index')->name('settings');
Route::get('/jobsettings','JobsController@index')->name('jsettings');
Route::post('/jobsettings','JobsController@store')->name('js.post');


Route::get('/jquest','AdminsController@jobquest')->name('jq');
Route::post('/jquest','AdminsController@jobqpost')->name('jq.post');
