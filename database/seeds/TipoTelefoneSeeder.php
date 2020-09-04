<?php

use Illuminate\Database\Seeder;

class TipoTelefoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_telefones')->insert([
            ['id'=>1, 'tipo'=>'Telefone Comercial', 'sigla'=>'COM'],
            ['id'=>2, 'tipo'=>'Telefone Residencial', 'sigla'=>'RES'],
            ['id'=>3, 'tipo'=>'Contato', 'sigla'=>'CONT'],
            ['id'=>4, 'tipo'=>'Celular', 'sigla'=>'CEL'],
        ]);
    }
}
