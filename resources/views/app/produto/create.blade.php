@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-fornecedor">
            <p>Produto - Adicionar</p>
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
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                {{ $sucesso ?? '' }}
                <form method="post" action="{{ route('produto.store') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $produto->id ?? '' }}">
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
                                {{ old('unidade_id') == $unidade->id ? 'selected' : '' }}
                            >{{ $unidade->descricao }}
                            </option>  
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection