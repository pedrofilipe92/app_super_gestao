@if (isset($pedido))
    <form method="post" action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}">
        @method('PUT')
@else
    <form method="post" action="{{ route('pedido.store') }}">
@endif
        @csrf
        <select name="cliente_id">
            <option value="">Selecione o cliente</option>
            @foreach ($clientes as $cliente)
                <option
                    value="{{ $cliente->id }}"
                    {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : ''}}
                    >{{ $cliente->nome }}</option>
            @endforeach
        </select>
            {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}
        <button type="submit" class="borda-preta">{{ isset($pedido) ? 'Atualizar' : 'Cadastrar' }}</button>
    </form>