<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdemServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_servico', function (Blueprint $table) {
            $table->increments('id', true);
            $table->timestamp("dt_abertura");
            $table->timestamp("dt_encerramento")->nullable();

            $table->integer('equip_id')->unsigned()->nullable();
            $table->foreign("equip_id")->references("id")->on("equipamentos")->onUpdate("CASCADE")->onDelete("NO ACTION");
            
            $table->integer('tipo_defeito')->unsigned()->nullable();
            $table->foreign("tipo_defeito")->references("id")->on("tipo_defeitos")->onUpdate("CASCADE")->onDelete("NO ACTION");

            // $table->integer('orcamento_id')->unsigned()->nullable();
            
            $table->text("defeito")->nullable();
            $table->text("solucao")->nullable();

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
        Schema::dropIfExists('ordem_servicos');
    }
}
