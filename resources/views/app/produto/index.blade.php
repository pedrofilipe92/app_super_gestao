@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-fornecedor">
            <p>Produto - Consultar</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('produto.create') }}">Novo</a>
                </li>
                <li>
                    <a href="{{ route('produto.index') }}">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                {{-- imprimindo dados do produto antes da chamada do relacionamento --}}
                {{-- {{ $produtos->toJson() }} --}}
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade Id</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->fornecedor->nome ?? '' }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id }}</td>
                            {{-- trazendo ProdutoDetalhe para a view --}}
                            {{-- <td>{{ $produto->comprimento ?? '' }}</td>
                            <td>{{ $produto->largura ?? '' }}</td>
                            <td>{{ $produto->altura ?? '' }}</td> --}}
                            {{-- trazendo ProdutoDetalhe através do relacionamento --}}
                            <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                            <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                            <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                            <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                            <td><a href="{{ route('produto.edit', $produto->id) }}">Editar</a></td>
                            <td>
                                <form
                                    id="form_{{ $produto->id }}"
                                    method="post"
                                    action="{{ route('produto.destroy', ['produto' => $produto->id]) }}"
                                >
                                    @method('DELETE')
                                    @csrf
                                    {{-- <button type="submit">Excluir</button> --}}
                                    <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- recupera os parametros da requisição para a paginação --}}
                {{ $produtos->appends($request)->links() }}
                <br>
                Exibindo {{ $produtos->count() }} produto(s) de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }}).
            </div>
            {{-- realizando lazy loading --}}
            {{-- {{ $produtos->toJson() }} --}}
        </div>
    </div>
@endsection