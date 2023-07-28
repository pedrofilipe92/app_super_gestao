<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Middleware\LogAcessoMiddleware;

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
// implementeando middlewares na rota
// Route::middleware(LogAcessoMiddleware::class)->get('/', 'PrincipalController@principal')->name('site.index');
// implementando apelidos para middlewares
// Route::middleware('log.acesso')->get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@create')->name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

// passando parametros para o controller e para a view
Route::get('/teste/{nome}/{email}', 'TesteController@teste')->name('site.teste');

// agrupando rotas
// atribuindo middlewares para um grupo de rotas
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group( function() {
    // encadeando middlewares
    // Route::middleware('log.acesso', 'autenticacao')->get('/clientes', 'ClientesController@clientes')->name('app.clientes');
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::prefix('/fornecedor')->group( function() {
        Route::get('/', 'FornecedorController@index')->name('app.fornecedor');
        Route::post('/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
        Route::get('/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
        Route::get('/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
        Route::post('/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
        Route::get('/editar/{id}/{sucesso?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
        Route::get('/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');
    });
    Route::resource('/produto', 'ProdutoController');
    Route::resource('/produto-detalhe', 'ProdutoDetalheController');
    Route::resource('/cliente', 'ClienteController');
    Route::resource('/pedido', 'PedidoController');
    // Route::resource('/pedido-produto', 'PedidoProdutoController');
    Route::get('pedido-produto/create/{pedido}', 'PedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', 'PedidoProdutoController@store')->name('pedido-produto.store');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
});

// // redirecionamento de rotas
// Route::get('/rota1', function() {
//     echo 'rota1';
// })->name('site.rota1');
// // pode ser feito assim
// Route::get('/rota2', function() {
//     return redirect()->route('site.rota1');
// })->name('site.rota2');
// // ou assim
// // Route::redirect('/rota2', '/rota1');

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