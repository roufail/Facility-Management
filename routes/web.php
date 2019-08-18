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
    return redirect('/admin');
});

//Auth::routes();
Auth::routes(['register' => false]);

//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin','namespace' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', 'dashboard@index');
    Route::get('/dashboard', 'dashboard@index');
    Route::get('/logout', 'dashboard@logout')->name('admin.logout');

    Route::group(['middleware' => 'AdminMiddleWare'], function () {
        Route::get('/control', 'dashboard@control')->name('contorl.edit');
        Route::post('/roles', 'dashboard@save_roles')->name('role.save');
    });

    Route::group(['middleware' => 'ManagerMiddleWare'], function () {
      Route::get('/approve-events', 'events@approve_events')->name('events.approve');
      Route::get('/approve/{id}', 'events@approve_event')->name('event.approve');
      Route::get('/reject/{id}', 'events@reject_event')->name('event.reject');
    });


        /** supporter **/
        Route::get('/support_approve/{id}/{type}', 'events@approve_support_event')->name('event.approve.support');
        Route::get('/support_reject/{id}/{type}', 'events@reject_support_event')->name('event.reject.support');
        Route::get('/general_support_approve/{id}', 'events@approve_general_support')->name('event.approve.general.support');
        Route::get('/general_support_reject/{id}', 'events@reject_general_support')->name('event.reject.general.support');



    /** events routes **/
    /** forms **/
    Route::get('/event/{id}/', 'events@edit_event')->name('event.edit');
    /**  creating **/
    Route::get('/event/{id}/caterings', 'events@create_caterings')->name('event.create_caterings');
    Route::get('/event/{id}/hotels', 'events@create_hotels')->name('event.create_hotels');
    Route::get('/event/{id}/transportations', 'events@create_transportations')->name('event.create_transportations');
    Route::get('/event/{id}/maintenances', 'events@create_maintenances')->name('event.create_maintenances');

    /** deleting **/
    Route::get('/catering/{id}/delete', 'events@delete_caterings')->name('event.delete_caterings');
    Route::get('/hotels/{id}/delete', 'events@delete_hotels')->name('event.delete_hotels');
    Route::get('/transportations/{id}/delete', 'events@delete_transportations')->name('event.delete_transportations');
    Route::get('/maintenances/{id}/delete', 'events@delete_maintenances')->name('event.delete_maintenances');


    /** saving **/
    Route::post('/event/{id}/', 'events@save_event')->name("events.save");
    Route::post('/event/{id}/publish', 'events@publish_event')->name("events.publish");
    Route::post('/event/{id}/catering', 'events@save_catering')->name("events.save_catering");
    Route::post('/event/{id}/hotel', 'events@save_hotels')->name("events.save_hotel");
    Route::post('/event/{id}/transportation', 'events@save_transportations')->name("events.save_transportation");
    Route::post('/event/{id}/maintenance', 'events@save_maintenances')->name("events.save_maintenance");



    Route::resource('/events', 'events');
});
