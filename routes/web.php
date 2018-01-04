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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/sobre', function () {
    return view('sobre');
})->name('sobre');

Route::get('/home', 'HomeController@dashboard')->name('dashboard');

Route::resource('campus', 'CampusController');
Route::resource('diretoria', 'DiretoriaController');
Route::resource('curso', 'CursoController');
Route::resource('turma', 'TurmaController');
Route::resource('eixo', 'EixoController');
Route::resource('aluno', 'PessoaController');
Route::resource('usuario', 'UserController');
Route::resource('questao', 'QuestaoController');
Route::resource('questionario', 'QuestionarioController');
