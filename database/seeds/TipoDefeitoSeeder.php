<?php

use Illuminate\Database\Seeder;

class TipoDefeitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_defeitos')->insert([
            ['id'=>1, 'descricao'=> 'Hardware'],
            ['id'=>2, 'descricao'=> 'Software'],
            ['id'=>3, 'descricao'=> 'Mau uso'],
            ['id'=>4, 'descricao'=> 'SemDefeito'],
            ['id'=>5, 'descricao'=> 'Outros'],
        ]);
    }
}
