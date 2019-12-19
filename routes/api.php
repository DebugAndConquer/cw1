<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/{post}/comments','CommentController@index')->name('index');
Route::delete('/{post}/comments/{comment}','CommentController@delete')->name('destroy');
Route::patch('/{post}/comments/{comment}','CommentController@update')->name('update');
Route::get('/{post}/comments/{comment}','CommentController@get')->name('get');

Route::middleware('auth:api')->group(function () {
    Route::post('/{post}/comment', 'CommentController@store');
});


