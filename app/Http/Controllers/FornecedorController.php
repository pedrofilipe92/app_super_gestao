<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

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

    public function listar(Request $request) {
        // listar
        // $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
        //     ->where('site', 'like', '%'.$request->input('site').'%')
        //     ->where('uf', 'like', '%'.$request->input('uf').'%')
        //     ->where('email', 'like', '%'.$request->input('email').'%')
        //     ->get();

        // paginação
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(5);

        // return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
        // passando parametros da requisição pelos links de paginação
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request)
    {
        $sucesso = '';

        // novo registro
        if($request->input('_token') != '' && $request->input('id') == '') {
            $regras = [
                'nome'  => 'required|min:3|max:40',
                'site'  => 'required',
                'uf'    => 'required|min:2|max:2',
                'email' => 'email'
            ];
            $mensagens = [
                'required'  => 'O campo :attribute é obrigatório.',
                'min'       => 'O campo :attribute precisa ter no mínimo :min caracteres.',
                'max'       => 'O campo :attribute precisa ter no máximo :max caracteres.',
                'email'     => 'Insira um email válido.'
            ];
    
            $request->validate($regras, $mensagens);
    
            Fornecedor::create($request->all());
            $sucesso = 'Cadastro realizado com sucesso.';
        }

        // editando registro
        if ($request->input('_token') != '' && $request->input('id') != '') {

            $fornecedor = Fornecedor::find($request->input('id'));
            $fornecedor->update($request->all());
            $sucesso = 'Cadastro alterado com sucesso.';

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id') , 'sucesso' => $sucesso]);
        }

        return view('app.fornecedor.adicionar', ['sucesso' => $sucesso]);
    }

    public function editar($id, $sucesso = '') {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'sucesso' => $sucesso]);
    }

    public function excluir($id)
    {
        // preenche campo deleted_at
        Fornecedor::find($id)->delete();
        // força a exclusão do registro
        // Fornecedor::find($id)->forceDelete();
        return redirect()->route('app.fornecedor');
    }
}
