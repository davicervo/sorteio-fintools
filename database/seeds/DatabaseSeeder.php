<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(BrindeSeeder::class);
        $this->call(DepartamentoSeeder::class);
    }
}
