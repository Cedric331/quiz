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


Route::get('/quiz', 'GameController@index')->name('quiz-index');
Route::get('/quiz/{id}', 'GameController@Quiz')->name('quiz');
Route::get('/reset/quiz', 'GameController@questionnaires');

Route::get('/create/quiz', 'QuizController@show')->name('show-quiz')->middleware('auth');
Route::post('/create/quiz', 'QuizController@create')->name('create-quiz')->middleware('auth');

Route::get('/create/questions/{id}', 'QuizController@createQuestions')->name('create-questions')->middleware('auth');
Route::post('/create/questions/{id}', 'QuizController@addQuestions')->name('add-questions')->middleware('auth');

Route::post('/create/questions/valide/{id}', 'QuizController@valideQuestions')->name('valide-questions')->middleware('auth');

Route::get('/valide-questionnaire/{id}', 'QuizController@MerciQuestionnaire')->middleware('auth');

Route::post('/quiz/compteur', 'GameController@compteur')->middleware('auth');
Route::delete('/quiz/delete/{id}', 'GameController@deleteQuiz')->middleware('auth');
Route::get('/account', 'UserController@index')->name('account')->middleware('auth');
Route::get('/account/mes-quiz', 'UserController@accountQuiz')->name('account-quiz')->middleware('auth');
Route::get('/account/information', 'UserController@information')->name('user-information')->middleware('auth');
Route::post('/account/information/update', 'UserController@update')->middleware('auth');
Route::post('/account/delete', 'UserController@delete')->name('user-delete')->middleware('auth');

// Route::get('/contact/merci', 'ContactController@index')->name('contact-merci');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@send')->name('contact-post');

Auth::routes();

