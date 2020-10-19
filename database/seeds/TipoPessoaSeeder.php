<?php

use Illuminate\Database\Seeder;

class TipoPessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_pessoa')->insert([
            ['id'=>1, 'tipo'=>'Pessoa Física', 'sigla'=>'PF'],
            ['id'=>2, 'tipo'=>'Pessoa jurídica', 'sigla'=>'PJ'],
            ['id'=>3, 'tipo'=>'Fornecedor', 'sigla'=>'FORN'],
            ['id'=>4, 'tipo'=>'Credor', 'sigla'=>'CRED'],
        ]);
    }
}
