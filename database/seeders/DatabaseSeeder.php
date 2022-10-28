<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {//Defino la creacion de los factories
        \App\Models\Cliente::factory(10)->create();
    }
}
