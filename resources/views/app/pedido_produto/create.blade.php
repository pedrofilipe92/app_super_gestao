@extends('app.layouts.basico')

@section('titulo', 'Produto de Pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-fornecedor">
            <p>Adicionar Produtos ao Pedido</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('pedido.index') }}">Voltar</a>
                </li>
                <li>
                    <a href="">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <h4>Produtos do Pedido</h4>
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                            <tr>
                                <td>{{ $produto->id ?? '' }}</td>
                                <td>{{ $produto->nome ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                

                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
        </div>
    </div>
@endsection