@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-fornecedor">
            <p>Fornecedor - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('app.fornecedor.adicionar') }}">Novo</a>
                </li>
                <li>
                    <a href="{{ route('app.fornecedor') }}">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                {{ $sucesso }}
                <form method="post" action="{{ route('app.fornecedor.adicionar') }}">
                    @csrf
                    <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome" class="borda-preta">
                    @if($errors->has('nome'))
                        {{ $errors->first('nome') }}
                    @endif
                    <input type="text" name="site" value="{{ old('site') }}" placeholder="Site" class="borda-preta">
                    @if($errors->has('site'))
                        {{ $errors->first('site') }}
                    @endif
                    <input type="text" name="uf" value="{{ old('uf') }}" placeholder="UF" class="borda-preta">
                    @if($errors->has('uf'))
                        {{ $errors->first('uf') }}
                    @endif
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" class="borda-preta">
                    @if($errors->has('email'))
                        {{ $errors->first('email') }}
                    @endif
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection