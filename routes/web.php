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

Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::get('/login', 'LoginController@login')->name('site.login');

// agrupando rotas
Route::prefix('/app')->group(function() {
    Route::get('/clientes', 'ClientesController@clientes')->name('app.clientes');
    Route::get('/fornecedores', 'FornecedoresController@fornecedores')->name('app.fornecedores');
    Route::get('/produtos', 'ProdutosController@produtos')->name('app.produtos');
});

// redirecionamento de rotas
Route::get('/rota1', function() {
    echo 'rota1';
})->name('site.rota1');
// pode ser feito assim
Route::get('/rota2', function() {
    return redirect()->route('site.rota1');
})->name('site.rota2');
// ou assim
// Route::redirect('/rota2', '/rota1');

// rota de contigencia (fallback)
Route::fallback(function() {
    echo 'a rota nao existe';
});

// passando parametros pela url
// Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}', 
//     function(string $nome = '', string $categoria = '', string $assunto = '', string $mensagem = '') {
//         echo 'nome: '. $nome . '<br>categoria: ' . $categoria . '<br>assunto: ' . $assunto . '<br>mensagem: ' . $mensagem;
//     });

// tratando tipos de parametros com expressõe regulares
// Route::get('/contato/{nome}/{categoria_id?}', function(string $nome, int $categoria_id = 1) {
//     echo "$nome e $categoria_id";
// })
//     // categoria_id entre 0 e 9 e pelo menos 1 parametro enviado
//     ->where('categoria_id', '[0-9]+')
//     // nome caractere entre A e Z ou a e z e pelo menos 1 parametro enviado
//     ->where('nome', '[A-Za-z]+');

// verbos http
// get
// post
// put
// patch
// delete
// options