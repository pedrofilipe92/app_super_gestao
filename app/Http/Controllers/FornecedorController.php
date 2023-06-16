<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = [
            0 => [
                    'nome' => 'forn1',
                    'status' => 'ativo',
                    'cnpj' => '000'
            ],
            1 => [
                    'nome' => 'forn2',
                    'status' => 'inativo'
            ]
        ];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
    // public function fornecedores() {
    //     return view('app.fornecedores');
    // }
}
