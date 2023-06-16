<h3>fornecedores index</h3>

@php
    
@endphp

{{-- @dd($fornecedores) --}}

@if(count($fornecedores))
    <p>existem {{ count($fornecedores) }} cadastrados</p>
@else
    <p>não existem fornecedores cadastrados</p>
@endif