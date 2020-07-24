<?php

use App\Http\Controllers\CategoriaController;
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

Route::get('/', function () {
    return view('home.home-home');
});

//rotas de categorias
Route::get('/categorias', 'CategoriaController@ConsultaCategorias');
Route::post('/consulta-por-categoria', 'CategoriaController@ConsultaPorCategoria');
Route::post('/inserir-categoria', 'CategoriaController@InserirCategoria');
Route::get('/excluir-categoria/{id}', 'CategoriaController@ExcluirCategoria');
Route::get('/editar-categoria-tl/{id}', 'CategoriaController@ConsultaUpdate');
Route::get('/editar-categoria', 'CategoriaController@EditarCategoria');

//rotas de filmes
Route::get('/filmes', 'FilmesController@ConsultaFilme');
Route::post('/consulta-por-filme', 'FilmesController@ConsultaPorFilme');
Route::post('/inserir-filme', 'FilmesController@InserirFilme');
Route::get('/excluir-filme/{id}', 'FilmesController@ExcluirFilme');
Route::get('/editar-filme-tl/{id}', 'FilmesController@ConsultaUpdate');
Route::post('/editar-filme', 'FilmesController@EditarFilme');
