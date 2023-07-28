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
                            <th>Data inclusão do produto no pedido</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                            <tr>
                                <td>{{ $produto->id ?? '' }}</td>
                                <td>{{ $produto->nome ?? '' }}</td>
                                {{-- imprimindo dados da coluna pivot --}}
                                <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <form
                                        method="post"
                                        action="{{ route('pedido-produto.destroy', ['pedido' => $pedido->id, 'produto' => $produto->id]) }}"
                                        id="form_{{ $pedido->id }}_{{ $produto->id }}"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <a
                                            href="#"
                                            onclick="document.getElementById('form_{{ $pedido->id }}_{{ $produto->id }}').submit()"
                                        >Excluir</a>
                                    </form>
                                </td>
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