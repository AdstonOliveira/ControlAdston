<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tipo_equipamento', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string("tipo",20);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('equipamentos', function (Blueprint $table) {
            $table->increments('id', true);

            $table->integer("tipo_id")->unsigned()->nullable();
            $table->foreign("tipo_id")->references("id")->on("tipo_equipamento")->onDelete("NO ACTION")->onUpdate("CASCADE");

            $table->integer("pessoa_id")->unsigned()->nullable();
            $table->foreign("pessoa_id")->references("id")->on("pessoas")->onDelete("CASCADE")->onUpdate("CASCADE");

            $table->string("descricao", 50)->nullable("");
            $table->string("marca", 30)->nullable("");
            $table->string("modelo", 30)->nullable("");

            $table->string("num_serie", 25)->nullable()->default("xxxxxx");

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
        Schema::dropIfExists('equipamentos');
        Schema::dropIfExists('tipo_equipamento');
    }
}
