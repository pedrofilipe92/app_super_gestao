<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        // utilizando a super global get para recuperar os dados do front
        // var_dump($_GET);
        // utilizando a super global post para recuperar os dados do front
        // var_dump($_POST);

        // echo '<pre>';
        // // recupera todo o conteudo
        // print_r($request->all());
        // echo '</pre>';
        // // recupera o atributo desejado
        // echo $request->input('telefone');

        // enviando os dados para o banco
        // $contato = new SiteContato;

        // preenchendo campo a campo
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');

        // preenchendo usando o create
        // deve ter os campos definidos no fillable
        // $contato->create($request->all());

        // preenchendo usando o fill
        // deve ter os campos definidos no fillable
        // $contato->fill($request->all());

        // $contato->save();

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function create(Request $request) {
        // criando regras de validação
        $regras = [
            // validando caracteres min e max
            'nome'                  => 'required|min:3|max:40',
            // validando dados unicos
            'telefone'              => 'required|unique:site_contatos',
            // validando email
            'email'                 => 'required|email',
            'motivo_contatos_id'    => 'required',
            'mensagem'              => 'required|max:2000'
        ];
        // personalizando mensagens de erro
        $mensagens = [
            'telefone.unique'                => 'Este telefone já está cadastrado.',

            'email.email'                    => 'Insira um email válido.',

            'motivo_contatos_id.required'    => 'O campo motivo precisa ser preenchido.',

            // mensagem de erro genérica
            'required' => 'O campo :attribute é obrigatório.',
            'min'      => 'O campo :attribute precisa ter no mínimo :min caracteres.',
            'max'      => 'O campo :attribute precisa ter no máximo :max caracteres.'
        ];
        // validando campos obrigatórios
        $request->validate($regras, $mensagens);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
