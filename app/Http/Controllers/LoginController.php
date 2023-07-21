<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index() {
        return view('site.login', ['titulo' => 'Login']);
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

        if($user->name) {
            return redirect()->route('site.index');
        }
    }
}
