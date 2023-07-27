<?php

namespace App\Http\Controllers;

use App\ProdutoDetalhe;
use App\Produto;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'sucesso';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());
        return redirect()->route('produto-detalhe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoDetalhe $produto_detalhe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoDetalhe $produto_detalhe)
    {
        // implementando eager loading no lado fraco do relacionamento
        $produto_detalhe = ProdutoDetalhe::with(['produto'])->find($produto_detalhe->id);
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', ['unidades' => $unidades, 'produto_detalhe' => $produto_detalhe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produto_detalhe)
    {
        $produto_detalhe->update($request->all());
        return redirect()->route('produto-detalhe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoDetalhe $produto_detalhe)
    {
        //
    }
}
