<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('pessoa_id')->unsigned()->nullable();
            $table->integer('tipo_id')->unsigned()->nullable();

            $table->string('logradouro', 100)->nullable();
            $table->integer('num');
            $table->string('bairro', 50)->nullable();
            $table->string('complemento', 50)->nullable();
            $table->string('cep', 15)->nullable();

            $table->integer('cidade_id')->unsigned()->nullable();

            $table->foreign('cidade_id')->references('id')->on('cities')->onDelete('NO ACTION')->onUpdate('CASCADE');
            $table->foreign('tipo_id')->references('id')->on('tipo_enderecos')->onDelete('NO ACTION')->onUpdate('CASCADE');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
