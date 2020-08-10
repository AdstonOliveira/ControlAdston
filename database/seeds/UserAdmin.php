<?php

use Illuminate\Database\Seeder;

class UserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Adston",
            'email' => 'aepdesenvolvimento@gmail.com',
            'password' => Hash::make('Adstom2708.'),
        ]);
    }
}
