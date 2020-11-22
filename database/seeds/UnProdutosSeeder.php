<?php

use Illuminate\Database\Seeder;

class UnProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('un_compra')->insert([
            ['id'=>1, 'UN'=>'Unidade',  'sigla'=>'UN','un_conversao'=>1],
            ['id'=>2, 'UN'=>'Peça',     'sigla'=>'PÇ','un_conversao'=>1],
            ['id'=>3, 'UN'=>'Caixa',    'sigla'=>'CX','un_conversao'=>1],
        ]);
        DB::table('un_estoque')->insert([
            ['id'=>1, 'UN'=>'Unidade',  'sigla'=>'UN','un_conversao'=>1],
            ['id'=>2, 'UN'=>'Peça',     'sigla'=>'PÇ','un_conversao'=>1],
            ['id'=>3, 'UN'=>'Caixa',    'sigla'=>'CX','un_conversao'=>1],
        ]);
        DB::table('un_venda')->insert([
            ['id'=>1, 'UN'=>'Unidade',  'sigla'=>'UN','un_conversao'=>1],
            ['id'=>2, 'UN'=>'Peça',     'sigla'=>'PÇ','un_conversao'=>1],
            ['id'=>3, 'UN'=>'Caixa',    'sigla'=>'CX','un_conversao'=>1],
        ]);
    }
}
