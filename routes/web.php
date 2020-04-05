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
Route::get('preguntas-opciones','QuestionsController@preguntas');
Route::get('{id}/preguntas-opciones-espesifica','QuestionsController@preguntasEspesifica');
Route::post('preguntas/crear','QuestionsController@store')->name('questions_create');

Route::get('lectura','ReadingsController@index')->name('readings');
Route::post('lectura/crear','ReadingsController@store')->name('readings_create');

Route::get('pruebaninos/{id}','TestController@testboys');
//Route::get('prueba/{title}','TestController@gettest')->name('gettest');

Route::get('pruebajovenes','TestController@testyoungs')->name('testyoungs');
//Route::get('pruebajo/{title}','TestController@gettest')->name('gettest');

Route::get('pruebaadultos','TestController@testadults')->name('testadults');
Route::get('prueba/{id}','TestController@getTest')->name('gettest');
Route::post('test-save','TestController@store')->name('testsave');
Route::post('{id_pregunta}/guardar-opcion', 'QuestionsController@guardarOpcionDePregunta');


Route::post('guardar-test','TestController@guardarTest');
Route::get('mostrar-test', 'TestController@mostrarTest');
Route::get('obtener-test-espesifico/{id}', 'TestController@obtenerTestEspesifica');


