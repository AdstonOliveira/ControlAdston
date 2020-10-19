<?php

use Illuminate\Database\Seeder;

class StatusOSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_os')->insert([
            ['id'=>1, 'status'=>'aberto'],
            ['id'=>2, 'status'=>"Em analise"],
            ['id'=>3, 'status'=>"Aguardando Aprovacao"],
            ['id'=>4, 'status'=>"Aprovado"],
            ['id'=>5, 'status'=>"Recusado"],
            ['id'=>6, 'status'=>"Finalizado"],
            ['id'=>7, 'status'=>"Aguardando Pecas"],
        ]);
    }
}
