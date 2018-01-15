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

Route::get('/', function () { return view('home'); } )->name('home');

Route::get('/home', 'HomeController@dashboard')->name('dashboard');
Route::get('/perfil', 'PessoaController@perfil')->name('perfil');

Route::resource('campus', 'CampusController');
Route::resource('diretoria', 'DiretoriaController');
Route::resource('curso', 'CursoController');
Route::resource('turma', 'TurmaController');
Route::resource('eixo', 'EixoController');
Route::resource('aluno', 'PessoaController');
Route::resource('questao', 'QuestaoController');
Route::resource('questionario', 'QuestionarioController');

Route::get('/vinculo/status', 'HomeController@status')->name('vinculo.status');
Route::post('/vinculo/verificar', 'HomeController@verificar')->name('vinculo.verificar');

Route::get('/quiz/escolher', 'HomeController@escolher')->name('quiz.escolher');
Route::get('/quiz/{id}/iniciar/', 'HomeController@iniciar')->name('quiz.iniciar');
Route::post('/quiz/resultado', 'HomeController@resultado')->name('quiz.resultado');
Route::post('/quiz/resultadoInativo', 'HomeController@resultadoInativo')->name('quiz.resultadoInativo');

#
