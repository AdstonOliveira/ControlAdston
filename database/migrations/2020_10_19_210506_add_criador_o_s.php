<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class AddCriadorOS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordem_servico', function (Blueprint $table) {
            $table->unsignedBigInteger("aberto_por")->nullable()->after("status_id")->default(1);
            $table->foreign("aberto_por")->references("id")->on("users")->onUpdate("CASCADE")->onDelete("NO ACTION");
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
