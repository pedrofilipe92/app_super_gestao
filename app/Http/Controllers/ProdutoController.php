<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // crud completo utilizando o resource do artisan
    // php artisan make:controller MeuController --resource
    // necessário criação do model e da migration que podem ser feitos na mesma linha de comando ou separadamente

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // exibir lista de registros
        // necessário criar a view index
        // rota produto.index
        // verbo http get
        $produtos = Produto::paginate(10);
        
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // exibir formulário de criação do registro
        // necessário criar a view create
        // rota produto.create
        // verbo http get
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // receber formulário de criação do registro
        // rota produto.store
        // verbo http post
        $sucesso = '';
        $regras = [
            'nome'          => 'required|min:3|max:40',
            'descricao'     => 'max:200',
            'peso'          => 'required|integer',
            // precisa existir na tabela unidades
            // '<variavel>' => 'exists:<tabela>,<coluna>'
            'unidade_id'    => 'exists:unidades,id'
        ];
        $mensagens = [
            'required'  => 'O campo :attribute é obrigatório.',
            'integer'   => 'O campo :attribute deve ser um inteiro.',
            'min'       => 'O campo :attribute deve ter no mínimo :min caracteres.',
            'max'       => 'O campo :attribute deve ter no máximo :max caracteres.',
            'exists'    => 'Unidade não cadastrada.'
        ];

        $request->validate($regras, $mensagens);

        Produto::create($request->all());
        $sucesso = 'Produto incluído com sucesso.';

        return redirect()->route('produto.index', ['sucesso' => $sucesso]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        // exibir registro específico
        // necessário criar a view show ou reaproveitar a index
        // rota produto.show
        // verbo http get
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        // exibir formulário de edição do registro
        // necessário criar a view edit ou reaproveitar a create
        // rota produto.edit
        // verbo http get
        $unidades = Unidade::all();
        return view('app.produto.edit', ['unidades' => $unidades], ['produto' => $produto]);
        // return view('app.produto.create', ['unidades' => $unidades], ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        // reveber formulário de edição do registro
        // rota produto.update
        // verbo http put/patch
        // necessário implementar @method no formulário
        $regras = [
            'nome'          => 'required|min:3|max:40',
            'descricao'     => 'max:200',
            'peso'          => 'required|integer',
            'unidade_id'    => 'exists:unidades,id'
        ];
        $mensagens = [
            'required'  => 'O campo :attribute é obrigatório.',
            'integer'   => 'O campo :attribute deve ser um inteiro.',
            'min'       => 'O campo :attribute deve ter no mínimo :min caracteres.',
            'max'       => 'O campo :attribute deve ter no máximo :max caracteres.',
            'exists'    => 'Unidade não cadastrada.'
        ];

        $request->validate($regras, $mensagens);

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        // receber dados para remoção do registro
        // rota produto.delete
        // verbo http delete
        // necessário implementar @method no formulário
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
