<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        // utilizando a super global get para recuperar os dados do front
        // var_dump($_GET);
        // utilizando a super global post para recuperar os dados do front
        // var_dump($_POST);

        echo '<pre>';
        // recupera todo o conteudo
        print_r($request->all());
        echo '</pre>';
        // recupera o atributo desejado
        echo $request->input('telefone');
        return view('site.contato');
    }
}
