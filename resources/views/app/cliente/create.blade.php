@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-fornecedor">
            <p>Cliente - Adicionar</p>
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
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.cliente._components.form_create_edit')
                @endcomponent
            </div>
        </div>
    </div>
@endsection