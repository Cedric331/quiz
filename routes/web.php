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
Route::get('/quiz/reset', 'GameController@questionnaires');

Route::get('/account', 'UserController@index')->name('account')->middleware('auth');

Route::get('/create/quiz', 'QuizController@show')->name('show-quiz')->middleware('auth');
Route::post('/create/quiz', 'QuizController@create')->name('create-quiz')->middleware('auth');

Route::get('/create/questions/{id}', 'QuizController@createQuestions')->name('create-questions')->middleware('auth');
Route::post('/create/questions/{id}', 'QuizController@addQuestions')->name('add-questions')->middleware('auth');

Route::post('/create/questions/valide/{id}', 'QuizController@valideQuestions')->name('valide-questions')->middleware('auth');

Route::get('/valide-questionnaire/{id}', 'QuizController@MerciQuestionnaire')->middleware('auth');


Auth::routes();

