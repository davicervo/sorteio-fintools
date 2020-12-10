<?php

namespace App\Console\Commands;

use App\Models\Departamento;
use App\Models\Funcionario;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportaFuncionarios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'funcionarios:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importação de funcionários';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('https://ot-test.herokuapp.com/funcionarios');
        $ad_users = $response->json();
        $funcionarios = [];
        $agora = Carbon::now();
        foreach ($ad_users as $ad_user) {

            $departamento = Departamento::firstOrCreate([
                'nome_exibicao' => $ad_user['department'] ?? 'SEM DEPARTAMENTO'
            ]);

            $funcionarios[] = [
                'funcionario_uid' => $ad_user['object_guid'],
                'nome' => $ad_user['name'],
                'username' => $ad_user['username'],
                'departamento_uid' => $departamento->departamento_uid,
                'elegivel' => true,
                'created_at' => $agora,
                'updated_at' => $agora,
            ];
        }
        Funcionario::insert($funcionarios);
        echo "Importação de Funcionários finalizada com sucesso.";
    }
}
