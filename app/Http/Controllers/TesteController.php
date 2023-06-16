<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(string $nome, string $email) {
        // passando parametros para a view
        // pelo array associativo
        // return view('site.teste', ['nome' =>$nome, 'email' => $email]);
        // pelo compact
        return view('site.teste', compact('nome', 'email'));
        // pelo with
        // return view('site.teste')->with('nome', $nome)->with('email', $email);
    }
}
