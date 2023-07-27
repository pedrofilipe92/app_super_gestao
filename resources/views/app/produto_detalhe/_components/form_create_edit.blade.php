@if (isset($produto_detalhe))
    <form method="post" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
        @method('PUT')
@else
    <form method="post" action="{{ route('produto-detalhe.store') }}">
@endif
        @csrf
        <input type="hidden" name="id" value="{{ $produto_detalhe->id ?? '' }}">
        <input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" placeholder="Produto ID" class="borda-preta">
        @if($errors->has('produto_id'))
            {{ $errors->first('produto_id') }}
        @endif
        <input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" placeholder="Comprimento" class="borda-preta">
        @if($errors->has('comprimento'))
            {{ $errors->first('comprimento') }}
        @endif
        <input type="text" name="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}" placeholder="Largura" class="borda-preta">
        @if($errors->has('largura'))
            {{ $errors->first('largura') }}
        @endif
        <input type="text" name="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}" placeholder="Altura" class="borda-preta">
        @if($errors->has('altura'))
            {{ $errors->first('altura') }}
        @endif
        <select name="unidade_id">
            <option>Selecione a unidade de medida</option>
            @foreach ($unidades as $unidade)
                <option
                    value="{{ $unidade->id }}"
                    {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}
                >{{ $unidade->descricao }}
                </option>  
            @endforeach
        </select>
        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
        <button type="submit" class="borda-preta">{{ isset($produto_detalhe) ? 'Atualizar' : 'Cadastrar' }}</button>
    </form>