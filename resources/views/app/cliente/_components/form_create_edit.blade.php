@if (isset($cliente))
    <form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
        @method('PUT')
@else
    <form method="post" action="{{ route('cliente.store') }}">
@endif
        @csrf
        <input type="hidden" name="id" value="{{ $cliente->id ?? '' }}">
        <input type="text" name="nome" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
        @if($errors->has('nome'))
            {{ $errors->first('nome') }}
        @endif
        {{-- <input type="text" name="descricao" value="{{ $cliente->descricao ?? old('descricao') }}" placeholder="Descricao" class="borda-preta">
        @if($errors->has('descricao'))
            {{ $errors->first('descricao') }}
        @endif
        <input type="text" name="peso" value="{{ $cliente->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
        @if($errors->has('peso'))
            {{ $errors->first('peso') }}
        @endif
        <select name="unidade_id">
            <option>Selecione a unidade de medida</option>
            @foreach ($unidades as $unidade)
                <option
                    value="{{ $unidade->id }}"
                    {{ ($cliente->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}
                >{{ $unidade->descricao }}
                </option>  
            @endforeach
        </select>
        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }} --}}
        <button type="submit" class="borda-preta">{{ isset($cliente) ? 'Atualizar' : 'Cadastrar' }}</button>
    </form>