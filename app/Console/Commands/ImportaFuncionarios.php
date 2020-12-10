<?php

namespace App\Console\Commands;

use App\Models\Departamento;
use App\Models\Funcionario;
use App\Service\FuncionarioService;
use Carbon\Carbon;
use Illuminate\Console\Command;

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
        $ad_users = (new FuncionarioService)->getFuncionarios();
        $funcionarios = [];
        $agora = Carbon::now();
        $by = "COMMAND";
        foreach ($ad_users as $ad_user) {

            $departamento = Departamento::firstOrCreate([
                'nome_exibicao' => $ad_user['department'] ?? 'SEM DEPARTAMENTO'
            ]);

            // Verifica se user uid existe em Funcionario
            $funcionario = Funcionario::where('funcionario_uid', '=', $ad_user['object_guid'])->first();

            // Se ja existe funcionario atualiza se n existe prepara p incluir
            if ($funcionario != null) {
                $funcionario->update([
                    'nome' => $ad_user['name'],
                    'username' => $ad_user['username'],
                    'departamento_uid' => $departamento->departamento_uid,
                    'updated_at' => $agora,
                    'updated_by' => $by
                ]);
            } else {
                $funcionarios[] = [
                    'funcionario_uid' => $ad_user['object_guid'],
                    'nome' => $ad_user['name'],
                    'username' => $ad_user['username'],
                    'departamento_uid' => $departamento->departamento_uid,
                    'created_at' => $agora,
                    'updated_at' => $agora,
                    'created_by' => $by,
                    'updated_by' => $by
                ];
            }
        }
        Funcionario::insert($funcionarios);
        echo "Importação de Funcionários finalizada com sucesso.";
    }
}
