<h3>fornecedores index</h3>

@php
    
@endphp

{{-- @dd($fornecedores) --}}

@if(count($fornecedores))
    <p>existem {{ count($fornecedores) }} cadastrados</p>
@else
    <p>não existem fornecedores cadastrados</p>
@endif

{{-- inversão do if --}}
@unless(count($fornecedores) > 0)
    <p>não existem fornecedores cadastrados</p>
@endunless

{{-- verificar se a variavél foi definida --}}
@isset($fornecedores)
    @isset($fornecedores[0]['nome'])
        <p>{{ $fornecedores[0]['nome'] }}</p>
    @endisset
    @isset($fornecedores[0]['status'])
        <p>{{ $fornecedores[0]['status'] }}</p>
    @endisset
    @isset($fornecedores[0]['cnpj'])
        <p>{{ $fornecedores[0]['cnpj'] }}</p>
    @endisset
@endisset

{{-- verifica se a variavel está vazia --}}
{{-- '', 0, 0.0, '0', false, null, array(), $var --}}
@empty($fornecedores)
    <p>array vazio</p>
@endempty

{{-- if ternario com valor default --}}
{{-- se a variavel não estiver definida ou possui valor null --}}
@isset($fornecedores)
    <p>{{ $fornecedores[1]['nome'] ?? ''}}</p>
    <p>{{ $fornecedores[1]['status'] ?? ''}}</p>
    <p>{{ $fornecedores[1]['cnpj'] ?? ''}}</p>
@endisset