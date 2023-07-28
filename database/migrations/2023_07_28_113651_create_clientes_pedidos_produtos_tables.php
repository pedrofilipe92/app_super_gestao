<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesPedidosProdutosTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->timestamps();
        });

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
        });

        Schema::create('pedido_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('produto_id');
            $table->timestamps();

            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // desabilita a validação de constraints
        // permitindo a exclusão das tabelas sem dropar a fk antes
        Schema::disableForeignKeyConstraints();
        // Schema::table('pedido_produtos', function (Blueprint $table) {
        //     $table->dropForeign('pedido_produtos_produto_id_foreign');
        //     $table->dropForeign('pedido_produtos_pedido_id_foreign');
        // });
        Schema::dropIfExists('pedido_produtos');

        // Schema::table('pedidos', function (Blueprint $table) {
        //     $table->dropForeign('pedidos_cliente_id_foreign');
        // });
        Schema::dropIfExists('pedidos');

        Schema::dropIfExists('clientes');

        // habilita a validação de constraints
        Schema::enableForeignKeyConstraints();
    }
}
