<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDividasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_dividas', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string("tipo","20")->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('dividas', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->enum("status",[0=>"aberto", 1=>"Pago"])->default("aberto");
            
            $table->integer("pessoa_id")->unsigned()->nullable();
            $table->foreign("pessoa_id")->references("id")->on("pessoas")->onUpdate("CASCADE")->onDelete("NO ACTION");
            
            $table->integer("valor")->comment("Valor decimal, dividir por 10");
            $table->date("dt_vencimento")->nullable();
            $table->date("dt_pgto")->nullable();

            $table->integer("tipo_id")->unsigned()->nullable();
            $table->foreign("tipo_id")->references("id")->on("tipo_dividas")->onUpdate("CASCADE")->onDelete("NO ACTION");

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
        Schema::dropIfExists('tipo_dividas');
        Schema::dropIfExists('dividas');
    }
}
