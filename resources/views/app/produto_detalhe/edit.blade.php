@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-fornecedor">
            <p>Detalhes do Produto - Editar</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('produto-detalhe.create') }}">Novo</a>
                </li>
                <li>
                    <a href="">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <h4>Produto</h4>
            <div>
                Nome: {{ $produto_detalhe->produto->nome }}
            </div>
            <br>
            <div>
                Descrição: {{ $produto_detalhe->produto->descricao }}
            </div>
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.produto_detalhe._components.form_create_edit', ['unidades' => $unidades, 'produto_detalhe' => $produto_detalhe])
                @endcomponent
            </div>
        </div>
    </div>
@endsection