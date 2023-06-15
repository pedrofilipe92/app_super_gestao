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

// Route::get($uri, $callback);
// $uri = rota, caminho de entrada
// $callback = ação que deve ser tomada quando essa rota for acessada
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/sobre-nos', function() {
//     return 'Sobre nós';
// });
// Route::get('/contato', function() {
//     return 'Contato';
// });

Route::get('/', 'PrincipalController@principal');

Route::get('/sobre-nos', 'SobreNosController@sobreNos');

Route::get('/contato', 'ContatoController@contato');
// passando parametros pela url
Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}', 
    function(string $nome = '', string $categoria = '', string $assunto = '', string $mensagem = '') {
        echo 'nome: '. $nome . '<br>categoria: ' . $categoria . '<br>assunto: ' . $assunto . '<br>mensagem: ' . $mensagem;
    });

// verbos http
// get
// post
// put
// patch
// delete
// options