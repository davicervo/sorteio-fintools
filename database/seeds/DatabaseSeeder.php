<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            // DepartamentoSeeder::class,
            // FuncionarioSeeder::class,
            UsuarioSeeder::class,
            SorteiosSeeder::class,
            BrindeSeeder::class
        ]);
    }
}
