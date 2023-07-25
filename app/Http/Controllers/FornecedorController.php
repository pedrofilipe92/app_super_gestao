<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
        // $fornecedores = [
        //     0 => [
        //             'nome'      => 'forn1',
        //             'status'    => 'ativo',
        //             'cnpj'      => '000',
        //             'ddd'       => '71',
        //             'telefone'  => '12345'
        //     ],
        //     1 => [
        //             'nome'      => 'forn2',
        //             'status'    => 'inativo',
        //             'cnpj'      => null,
        //             'ddd'       => '21',
        //             'telefone'  => '44444'
        //     ],
        //     2 => [
        //         'nome'      => '3',
        //         'status'    => 'ativo',
        //         'cnpj'      => '77777',
        //         'ddd'       => '81',
        //         'telefone'  => '333'
        //     ]
        // ];

        // // if ternario
        // // isset($fornecedores[1]['cnpj']) ? dd('set') : dd('unset');

        // return view('app.fornecedor.index', compact('fornecedores'));
    }

    public function listar() {
        return view('app.fornecedor.listar');
    }

    public function adicionar()
    {
        return view('app.fornecedor.adicionar');
    }
}
