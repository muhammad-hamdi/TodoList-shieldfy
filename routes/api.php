<?php

use Illuminate\Http\Request;

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

Route::get('todos', 'Api\TodoController@index')->name('api.todos.index');
Route::post('todos', 'Api\TodoController@store')->name('api.todos.store');
Route::delete('todos/{todo}', 'Api\TodoController@destroy')->name('api.todos.destroy');