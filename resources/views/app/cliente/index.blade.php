@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-fornecedor">
            <p>Clientes - Consultar</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('cliente.create') }}">Novo</a>
                </li>
                <li>
                    <a href="{{ route('cliente.index') }}">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                {{-- imprimindo dados do cliente antes da chamada do relacionamento --}}
                {{-- {{ $clientes->toJson() }} --}}
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
                            <td><a href="{{ route('cliente.edit', $cliente->id) }}">Editar</a></td>
                            <td>
                                <form
                                    id="form_{{ $cliente->id }}"
                                    method="post"
                                    action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}"
                                >
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $cliente->id }}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $clientes->appends($request)->links() }} --}}
                <br>
                Exibindo {{ $clientes->count() }} cliente(s) de {{ $clientes->total() }} (de {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }}).
            </div>
            {{-- realizando lazy loading --}}
            {{-- {{ $clientes->toJson() }} --}}
        </div>
    </div>
@endsection