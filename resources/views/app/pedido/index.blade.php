@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-fornecedor">
            <p>Pedidos - Consultar</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('pedido.create') }}">Novo</a>
                </li>
                <li>
                    <a href="{{ route('pedido.index') }}">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                {{-- imprimindo dados do pedido antes da chamada do relacionamento --}}
                {{-- {{ $pedidos->toJson() }} --}}
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Pedido ID</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Adicionar Produtos</a></td>
                            <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></td>
                            <td><a href="{{ route('pedido.edit', $pedido->id) }}">Editar</a></td>
                            <td>
                                <form
                                    id="form_{{ $pedido->id }}"
                                    method="post"
                                    action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}"
                                >
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $pedidos->appends($request)->links() }}
                <br>
                Exibindo {{ $pedidos->count() }} pedido(s) de {{ $pedidos->total() }} (de {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }}).
            </div>
            {{-- realizando lazy loading --}}
            {{-- {{ $pedidos->toJson() }} --}}
        </div>
    </div>
@endsection