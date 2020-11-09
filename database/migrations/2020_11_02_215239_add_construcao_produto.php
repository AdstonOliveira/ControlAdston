<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstrucaoProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('un_venda', function (Blueprint $table) {
            $table->increments('id');
            $table->string("UN")->nullable();
            $table->string("sigla",5)->nullable();
            $table->float("un_conversao",4)->default(1);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('un_estoque', function (Blueprint $table) {
            $table->increments('id');
            $table->string("UN")->nullable();
            $table->string("sigla",5)->nullable();
            $table->float("un_conversao",4)->default(1);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('un_compra', function (Blueprint $table) {
            $table->increments('id');
            $table->string("UN")->nullable();
            $table->string("sigla",5)->nullable();
            $table->float("un_conversao",4)->default(1);

            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create('marca', function (Blueprint $table) {
            $table->increments('id');
            $table->string("marca");
            $table->string("fabricante")->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('categoria', function (Blueprint $table) {
            $table->increments('id');
            $table->string("categoria");

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tributacao', function (Blueprint $table) {
            $table->increments('id');

            $table->softDeletes();
            $table->timestamps();
        });




        Schema::table('produto', function (Blueprint $table) {

            $table->unsignedInteger("un_venda_id")->nullable()->after("produto");
            $table->foreign("un_venda_id")->references("id")->on("un_venda")->onUpdate("CASCADE")->onDelete("NO ACTION");
            
            $table->unsignedInteger("un_compra_id")->nullable()->after("produto");
            $table->foreign("un_compra_id")->references("id")->on("un_compra")->onUpdate("CASCADE")->onDelete("NO ACTION");

            $table->unsignedInteger("un_estoque_id")->nullable()->after("produto");
            $table->foreign("un_estoque_id")->references("id")->on("un_estoque")->onUpdate("CASCADE")->onDelete("NO ACTION");

            $table->unsignedInteger("marca_id")->nullable();
            $table->foreign("marca_id")->references("id")->on("marca")->onUpdate("CASCADE")->onDelete("NO ACTION");

            $table->unsignedInteger("categoria_id")->nullable();
            $table->foreign("categoria_id")->references("id")->on("categoria")->onUpdate("CASCADE")->onDelete("NO ACTION");


            $table->float("margem_lucro", 4)->default(5);
            $table->string("codigo_interno")->nullable();
            $table->string("codigo_barras")->nullable();
            $table->float("preco_venda_atual", 4)->nullable();
            $table->string("modelo", 20)->nullable();
            $table->string("descricao", 100)->nullable();
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produto', function (Blueprint $table) {
            //
        });
    }
}
