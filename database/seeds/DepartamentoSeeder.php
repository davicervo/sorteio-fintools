<?php

use App\Models\Departamento;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Departamento::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        for ($i=0; $i < 5; $i++) {
            Departamento::create([
                'departamento_uid' => $i,
                'nome_exibicao' => "departamento exemplo{$i}"
            ]);
        }
    }
}
