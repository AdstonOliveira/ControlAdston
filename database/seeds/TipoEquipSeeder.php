<?php

use Illuminate\Database\Seeder;

class TipoEquipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_equipamento')->insert([
            ['id'=>1, 'tipo'=>'Computador'],
            ['id'=>2, 'tipo'=>'Notebook'],
            ['id'=>3, 'tipo'=>'NetBook'],
        ]);
    }
}
