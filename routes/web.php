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



Route::get('/', 'HomeController@index')->name('home')->middleware('guest');

Route::get('/account', 'UserController@index')->name('account')->middleware('auth');

Route::get('/create/quiz', 'QuizController@create')->name('create-quiz')->middleware('auth');


Auth::routes();

