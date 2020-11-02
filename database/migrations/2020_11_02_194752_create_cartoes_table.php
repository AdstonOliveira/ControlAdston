<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tipo_cartao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("tipo")->unsigned()->nullable();
            

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('cartoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string("bandeira");
            $table->float("taxa", 4)->nullable()->default(0.0000);

            $table->integer("tipo_id")->unsigned()->nullable();
            $table->foreign("tipo_id")->references("id")->on("tipo_cartao")
                ->onUpdate("CASCADE")->onDelete("NO ACTION");

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
        Schema::dropIfExists('tipo_cartao');
        Schema::dropIfExists('cartoes');
    }
}
