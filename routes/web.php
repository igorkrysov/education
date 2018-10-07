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

Route::resource('dictionary', 'DictionaryController');
Route::resource('word', 'WordController');
Route::get('/user/dictionaries', 'DictionaryController@dictionaries')->name('dictionaries');
Route::get('/user/dictionary/{dictionary}', 'DictionaryController@dictionary')->name('dictionary');
Route::get('/user/word-translate/{type}/{dictionary}', 'DictionaryController@wordTranslate')->name('word-translate');
Route::get('/user/words/{type}/{count}/{dictionary}', 'DictionaryController@getWords')->name('get-words');
Route::get('/user/word-update/{type}/{word}', 'DictionaryController@updateWords')->name('update-words');
Route::get('/user/clear-word-translate/{dictionary}', 'DictionaryController@clearWT')->name('clear-word-translate');
Route::get('/user/clear-translate-word/{dictionary}', 'DictionaryController@clearTW')->name('clear-translate-word');

Route::get('/user/word-repeat', 'RepeatWordController@index')->name('repeat.index');
Route::get('/user/word-repeat/{word}', 'RepeatWordController@addRepeatWords')->name('to-repeat-words');
Route::get('/user/repeat/words/{count}', 'RepeatWordController@getWords')->name('get-repeat-words');
Route::get('/user/repeat/word-update/{word}', 'RepeatWordController@updateWords')->name('update-repeat-words');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
