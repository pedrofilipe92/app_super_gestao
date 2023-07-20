<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contatos', function(Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        // executa uma query no banco
        // associa os valores de motivo_contato para motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        // cria a foreign key
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            // remove a coluna motivo_contato
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // recria a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            // remove a foreign key
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        // associa os valores da foreign para motivo_contato
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        // remove a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
