<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id', true);

            $table->string("nome",20)->nullable();
            $table->string("sobrenome",50)->nullable();

            $table->date('dt_nascimento')->nullable();

            $table->string("razao_social", 50);

            $table->string('email')->unique();


            $table->integer('tipo_id')->unsigned()->nullable()->default(1);
            $table->foreign('tipo_id')->references('id')->on('tipo_pessoa')->onDelete('NO ACTION')->onUpdate('CASCADE');

            $table->integer('docs_id')->unsigned()->nullable();
            $table->foreign('docs_id')->references('id')->on('documentos')->onDelete('NO ACTION')->onUpdate('CASCADE');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('enderecos', function (Blueprint $table) {
            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
