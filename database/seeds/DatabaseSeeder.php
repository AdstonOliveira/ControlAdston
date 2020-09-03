<?php

use App\TipoEndereco;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                StatesTableSeeder::class,
                CitiesTableSeeder::class,
                UserAdmin::class,
                TipoEnderecoSeeder::class,
                TipoPessoaSeeder::class
            ]
        );

    }
}
