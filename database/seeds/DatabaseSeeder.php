<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BrindeSeeder::class,
            DepartamentoSeeder::class,
            UsuarioSeeder::class,
            FuncionarioSeeder::class
        ]);
    }
}
