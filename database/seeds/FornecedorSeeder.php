<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $fornecedor = new Fornecedor();
        // $fornecedor->nome = 'fulano';
        // $fornecedor->site = 'www.fula.com';
        // $fornecedor->uf = 'ba';
        // $fornecedor->email = 'fulano@11';
        // $fornecedor->save();

        // // fillable do model deve estar preenchido com os atributos
        // Fornecedor::create([
        //     'nome'    => 'ciclano',
        //     'site'    => 'brasamora.com.br',
        //     'uf'      => 'df',
        //     'email'   => 'brasa@mora',
        // ]);

        // // insert
        // DB::table('fornecedores')->insert([
        //     'nome'    => 'beltrano',
        //     'site'    => 'seila.com.br',
        //     'uf'      => 'sp',
        //     'email'   => 'esse@mesmo',
        // ]);

        // gerando registros com factory
        factory(Fornecedor::class, 3)->create();
    }
}
