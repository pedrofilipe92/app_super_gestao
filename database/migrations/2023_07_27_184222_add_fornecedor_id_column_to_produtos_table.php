<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddFornecedorIdColumnToProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome'  => 'fornecedor padrao',
                'site'  => 'sitepadrao.com.br',
                'uf'    => 'ZZ',
                'email' => 'emailpadrao@fornecedores.com'
            ]);
            // estaria certo dessa forma, porém como já existem registros na tabela, ocorrerá um erro
            // necessário limpar a tabela no banco ou criar um registro padrão para estabelecer o relacionamento
            $table->unsignedBigInteger('fornecedor_id')->after('id')->default($fornecedor_id);
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
}
