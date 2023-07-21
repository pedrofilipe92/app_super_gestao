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

        if($user) {
            return redirect()->route('site.index');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }
}
