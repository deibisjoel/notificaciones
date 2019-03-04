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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/messages', 'HomeController@store')->name('messages.store');
Route::get('messages/{id}', 'HomeController@show')->name('messages.show');

Route::get('notificaciones', 'NotificationsController@index')->name('notifications.index');
Route::put('notificaciones/{id}', 'NotificationsController@update')->name('notifications.update');
Route::delete('notificaciones/{id}', 'NotificationsController@destroy')->name('notifications.destroy');


