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

Route::get('preguntas','QuestionsController@index')->name('questions');
Route::post('preguntas/crear','QuestionsController@store')->name('questions_create');

Route::get('lectura','ReadingsController@index')->name('readings');
Route::post('lectura/crear','ReadingsController@store')->name('readings_create');

Route::get('pruebaninos','TestController@testboys')->name('testboys');
//Route::get('prueba/{title}','TestController@gettest')->name('gettest');

Route::get('pruebajovenes','TestController@testyoungs')->name('testyoungs');
//Route::get('pruebajo/{title}','TestController@gettest')->name('gettest');

Route::get('pruebaadultos','TestController@testadults')->name('testadults');
Route::get('prueba/{id}','TestController@getTest')->name('gettest');

