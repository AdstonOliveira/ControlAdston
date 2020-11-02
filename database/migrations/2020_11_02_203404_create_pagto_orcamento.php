<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagtoOrcamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condicao_pagto', function (Blueprint $table) {
            $table->increments('id');
            $table->string("descricao");
            $table->integer("parcelas")->default(1);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('pagto_orcamento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("orcamento_id")->nullable();
            $table->foreign("orcamento_id")->references("id")->on("orcamento")->onUpdate("CASCADE")->onDelete("CASCADE");

            $table->unsignedInteger("forma_id")->nullable();
            $table->foreign("forma_id")->references("id")->on("forma_pagto")->onUpdate("CASCADE")->onDelete("SET NULL");

            $table->unsignedInteger("cartao_id")->nullable();
            $table->foreign("cartao_id")->references("id")->on("cartoes")->onUpdate("CASCADE")->onDelete("SET NULL");

            $table->unsignedInteger("condicao_id")->nullable();
            $table->foreign("condicao_id")->references("id")->on("condicao_pagto")->onUpdate("CASCADE")->onDelete("NO ACTION");

            $table->float("valor")->default(0);
            $table->string("numero_doc", 100)->nullable();            

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagto_orcamento');
    }
}
