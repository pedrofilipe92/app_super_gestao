<form method="post" action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}">
    @csrf
    <select name="produto_id">
        <option value="">Selecione o produto</option>
        @foreach ($produtos as $produto)
            <option
                value="{{ $produto->id }}"
                {{ old('produto_id') == $produto->id ? 'selected' : ''}}
                >{{ $produto->nome }}</option>
        @endforeach
        <input type="number" name="quantidade" value="{{ old('quantidade') ?? '' }}" placeholder="Quantidade" class="borda-preta">
        {{ $errors->has('quantidade') ? $errors->first('quantidade') : ''}}
    </select>
        {{ $errors->has('produto_id') ? $errors->first('produto_id') : ''}}
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>