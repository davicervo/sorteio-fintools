<?php

use App\Models\Departamento;
use App\Models\Funcionario;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://ot-test.herokuapp.com/funcionarios');
        $ad_users = $response->json();
        $funcionarios = [];
        $agora = Carbon::now();
        foreach ($ad_users as $ad_user) {

            $departamento = Departamento::firstOrCreate([
                'nome_exibicao' => $ad_user['department'] ?? 'SEM DEPARTAMENTO'
            ]);
            $departamento = $departamento->departamento_uid;


            $funcionarios[] = [
                'funcionario_uid' => $ad_user['object_guid'],
                'nome' => $ad_user['name'],
                'departamento_uid' => $departamento,
                'elegivel' => true,
                'foto' => null,
                'created_at' => $agora,
                'updated_at' => $agora,
            ];
        }
        Funcionario::insert($funcionarios);
    }
}
