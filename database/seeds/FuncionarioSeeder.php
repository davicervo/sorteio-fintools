<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('funcionarios:import');
    }
}
