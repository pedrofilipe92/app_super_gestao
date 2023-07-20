{{ $slot }}

{{-- enviando dados do formulario --}}
{{-- method get envia os dados pela url --}}
{{-- <form action={{ route("site.contato") }} method="get"> --}}
<form action={{ route("site.contato") }} method="post">
    {{-- method post precisa do token --}}
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    @if($errors->has('nome'))
        {{ $errors->first('nome') }}
    @endif
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
    @if($errors->has('telefone'))
        {{ $errors->first('telefone') }}
    @endif
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    @if($errors->has('email'))
        {{ $errors->first('email') }}
    @endif
    <br>
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
        {{-- <option value="1" {{ old('motivo_contato' == 1) ? 'selected' : '' }}>Dúvida</option>
        <option value="2" {{ old('motivo_contato' == 2) ? 'selected' : '' }}>Elogio</option>
        <option value="3" {{ old('motivo_contato' == 3) ? 'selected' : '' }}>Reclamação</option> --}}
    </select>
    @if($errors->has('motivo_contatos_id'))
        {{ $errors->first('motivo_contatos_id') }}
    @endif
    <br>
    <textarea name="mensagem" class="{{ $classe }}">
        {{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui a sua mensagem' }}
    </textarea>
    @if($errors->has('mensagem'))
        {{ $errors->first('mensagem') }}
    @endif
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

{{-- tratando os erros no front --}}
{{-- @if($errors->any())
    <div style="position:absolute; top:0px; left:0px; width:100%; background:red">
        @foreach($errors->all() as $erro)
            {{ print_r($erro) }}
            <br>
        @endforeach
    </div>
@endif --}}