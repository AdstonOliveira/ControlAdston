<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormaPagto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_pagto', function (Blueprint $table) {
            $table->increments('id');
            $table->string("tipo",20);


            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create('forma_pagto', function (Blueprint $table) {
            $table->increments('id');
            $table->string("forma",20)->default("dinheiro");
            $table->integer("tipo_id")->unsigned()->nullable();
            $table->foreign("tipo_id")->references("id")->on("tipo_pagto")->onUpdate("CASCADE")->onDelete("NO ACTION");


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
        Schema::dropIfExists('forma_pagto');
    }
}
