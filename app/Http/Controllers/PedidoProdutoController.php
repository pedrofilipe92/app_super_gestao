<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Produto;
use App\PedidoProduto;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();

        // eager loading
        $pedido->produtos;

        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = 
            [
                'produto_id' => 'exists:produtos,id',
                'pedido_id'  => 'exists:pedidos,id',
                'quantidade' => 'required'
            ];
        $mensagens = ['exists' => ':attribute não cadastrado.', 'required' => ':attribute deve ser preenchido.'];
        $request->validate($regras, $mensagens);

        // PedidoProduto::create(
        //     [
        //         'produto_id'    => $request->get('produto_id'),
        //         'pedido_id'     => $pedido->id,
        //         'quantidade'    => $request->get('quantidade')
        //     ]);

        // fazendo a inclusão do PedidoProduto através do relacionamento
        // $pedido->produtos()->attach('{id do produto}', '{array com as colunas e os valores a serem inseridos}');
        $pedido->produtos()->attach($request->get('produto_id'), [
            'quantidade' => $request->get('quantidade')
        ]);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
