{{ $slot }}

@if (isset($produto))
    <form method="post" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
        @method('PUT')
@else
    <form method="post" action="{{ route('produto.store') }}">
@endif
        @csrf
        <input type="hidden" name="id" value="{{ $produto->id ?? '' }}">
        <select name="fornecedor_id">
            <option>Selecione o fornecedor</option>
                @foreach ($fornecedores as $fornecedor)
                    <option
                        value="{{ $fornecedor->id }}"
                        {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }}
                    >{{ $fornecedor->nome }}
                    </option>  
                @endforeach
        </select>
        {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}
        <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
        @if($errors->has('nome'))
            {{ $errors->first('nome') }}
        @endif
        <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descricao" class="borda-preta">
        @if($errors->has('descricao'))
            {{ $errors->first('descricao') }}
        @endif
        <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
        @if($errors->has('peso'))
            {{ $errors->first('peso') }}
        @endif
        <select name="unidade_id">
            <option>Selecione a unidade de medida</option>
            @foreach ($unidades as $unidade)
                <option
                    value="{{ $unidade->id }}"
                    {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}
                >{{ $unidade->descricao }}
                </option>  
            @endforeach
        </select>
        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
        <button type="submit" class="borda-preta">{{ isset($produto) ? 'Atualizar' : 'Cadastrar' }}</button>
    </form>