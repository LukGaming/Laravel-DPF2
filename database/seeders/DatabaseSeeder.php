<?php

namespace Database\Seeders;

use App\Models\Jogador;
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
         //\App\Models\User::factory(100)->create();
        \App\Models\Jogador::factory(500)->create();
    }
}
