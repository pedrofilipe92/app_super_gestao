<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SiteContato::create([
        //     'nome'              => 'pedro',
        //     'telefone'          => '92804280',
        //     'email'             => 'peu@92',
        //     'motivo_contato'    => 1,
        //     'mensagem'          => 'essa é minha mensagem'
        // ], [
        //     'nome'              => 'eu',
        //     'telefone'          => '222',
        //     'email'             => 'teste',
        //     'motivo_contato'    => 1,
        //     'mensagem'          => 'vai'
        // ]);

        // inserindo registros gerados aleatoriamente no banco com o factory
        // factory({model}::class, {qtd de registros a serem gerados})->create();
        factory(SiteContato::class, 100)->create();
    }
}
