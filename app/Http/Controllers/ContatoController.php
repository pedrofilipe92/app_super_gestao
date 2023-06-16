<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato() {
        // utilizando a super global get para recuperar os dados do front
        var_dump($_GET);
        return view('site.contato');
    }
}
