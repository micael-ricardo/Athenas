<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\PessoaController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/cadastrar', 'CategoriaController@ListarCategorias');

$router->get('/pessoas', 'PessoaController@ListarPessoas');
$router->get('/pessoas/{id}', 'PessoaController@ListarPessoa');
$router->post('/pessoas', 'PessoaController@InserirPessoa');
$router->delete('/pessoas/{id}', 'PessoaController@DeletePessoa');


$router->get('/listar', function () {
    return view('listar');
});
