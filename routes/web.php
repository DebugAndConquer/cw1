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


Auth::routes();

Route::get('/','MainController@welcome')->name('welcome');
Route::get('/','MainController@index')->name('index');
Route::get('/create','MainController@create')->name('create')->middleware('auth');
Route::get('/{post}','CommentController@welcome')->name('commWelcome');
Route::get('/{post}/edit','MainController@edit')->name('edit')->middleware('auth');
Route::patch('/{post}','MainController@update')->name('update');
Route::delete('/{post}','MainController@destroy')->name('destroy');
Route::post('/','MainController@store')->name('store');
