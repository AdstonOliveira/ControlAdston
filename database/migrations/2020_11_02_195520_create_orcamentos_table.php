<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrcamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_orc', function (Blueprint $table) {
            $table->increments('id');
            $table->string("status");

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('orcamento', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->timestamp("dt_abertura")->default( DB::raw('CURRENT_TIMESTAMP') );
            $table->timestamp("dt_encerramento")->nullable();

            $table->integer("pessoa_id")->unsigned()->nullable();
            $table->foreign("pessoa_id")->references("id")->on("pessoas")->onUpdate("CASCADE")->onDelete("SET NULL");

            $table->integer("status_id")->unsigned()->nullable();
            $table->foreign("status_id")->references("id")->on("status_orc")->onUpdate("CASCADE")->onDelete("SET NULL");


            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create("orcamento_produto", function(Blueprint $table){
            $table->bigIncrements("id");
            $table->unsignedBigInteger("orcamento_id")->nullable();
            $table->foreign("orcamento_id")->references("id")->on("orcamento")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->unsignedBigInteger("produto_id")->nullable();
            $table->foreign("produto_id")->references("id")->on("produto")->onUpdate("CASCADE")->onDelete("SET NULL");

            $table->float("preco", 3)->default(0);
            $table->float("qtde",5)->default(1);
            $table->float("desconto",3)->nullable()->default(0);

            $table->softDeletes();
            $table->timestamps();
        });


        Schema::table('ordem_servico', function (Blueprint $table) {
            $table->unsignedBigInteger("orcamento_id")->nullable();
            $table->foreign("orcamento_id")->references("id")->on("orcamento")->onUpdate("CASCADE")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_orc');
        Schema::dropIfExists('orcamento');
        Schema::dropIfExists('orcamento_produto');
        Schema::table('ordem_servico', function (Blueprint $table) {
            $table->dropColumn('orcamento_id');
        });
    }
}
