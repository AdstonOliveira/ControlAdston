<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoTelefonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_telefones', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string("tipo")->nullable();
            $table->string("sigla")->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('telefones', function (Blueprint $table) {
            $table->integer('tipo_id')->unsigned()->nullable()->after("id");

            $table->foreign("tipo_id")->references("id")->on("tipo_telefones");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_telefones');
    }
}
