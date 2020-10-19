<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusOS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        
        Schema::create('status_os', function (Blueprint $table) {
            $table->increments("id", true);
            $table->string("status", 20)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('ordem_servico', function (Blueprint $table) {
            $table->integer("status_id")->after("id")->unsigned()->nullable();
            $table->foreign("status_id")->references("id")->on("status_os")->onUpdate("CASCADE")->onDelete("NO ACTION");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordem_servico', function (Blueprint $table) {
            //
        });
    }
}
