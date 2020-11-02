<?php

use App\FormaPagto;
use App\TipoPagto;
use Illuminate\Database\Seeder;

class TiposPagto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoPagto::create(
            ["id"=>1, "tipo"=>"A Vista"],
        );
        TipoPagto::create(
            ["id"=>2, "tipo"=>"A Prazo"],
        );
        TipoPagto::create(
            ["id"=>3, "tipo"=>"Cartao"]
        );

        FormaPagto::create(
            ["tipo_id"=>1,"forma"=>"Dinheiro"],
        );
        FormaPagto::create(
            ["tipo_id"=>2,"forma"=>"Boleto"],
        );
        FormaPagto::create(
            ["tipo_id"=>3,"forma"=>"Cartao Debito"],
        );
        FormaPagto::create(
            ["tipo_id"=>3,"forma"=>"Cartao Credito"],
        );

    }
}
