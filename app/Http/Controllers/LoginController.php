<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request) {
        $erro = '';

        if($request->get('erro') == 1) {
            $erro = 'Usuário ou senha incorreto.';            
        }
        if ($request->get('erro') == 2) {
            $erro = 'Necessário login para acessar a página.';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {
        $regras = [
            'usuario' => 'required|email',
            'senha' => 'required'
        ];

        $mensagens = [
            'usuario.email' => 'Insira um email válido.',
            'required' => 'Campo :attribute é obrigatório.'
        ];
        $request->validate($regras, $mensagens);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = User::where('email', $email)->where('password', $password)->get()->first();

        if(isset($user->name)) {
            session_start();
            $_SESSION['nome'] = $user->name;
            $_SESSION['email'] = $user->email;
            
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair() {
        echo 'sair';
    }
}
