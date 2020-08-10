<?php

use Illuminate\Database\Seeder;

class TipoEnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_enderecos')->insert([
            ['id'=>1, 'tipo'=> 'Residencial'],
            ['id'=>2, 'tipo'=> 'Comercial'],
            ['id'=>3, 'tipo'=> 'Entrega'],
            ['id'=>4, 'tipo'=> 'Cobrança'],
        ]);
    }
}
