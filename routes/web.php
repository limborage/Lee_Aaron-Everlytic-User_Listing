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

Route::get('/', 'UserController@index')->name('user_index');
Route::post('/create-user', 'UserController@new')->name('user_create');
Route::post('/update-user/{id}', 'UserController@update')->name('user_update');
Route::post('/delete-user/{id}', 'UserController@delete')->name('user_delete');

//Ajax
Route::post('/ajax-edit-form', 'UserController@editForm')->name('user_form_edit');
Route::post('/ajax-new-form', 'UserController@newForm')->name('user_form_new');
