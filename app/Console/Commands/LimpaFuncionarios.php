<?php

namespace App\Console\Commands;

use App\Models\Funcionario;
use App\Service\FuncionarioService;
use Illuminate\Console\Command;

class LimpaFuncionarios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'funcionarios:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Limpa funcionários que estão no BD mas não estão na base de funcionários.';

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
        // recuperando apenas o uid
        $ad_users = array_column($ad_users, 'object_guid');

        // recupera todos os funcionarios
        $funcionarios = Funcionario::get();

        $funcionarios_destruidos = [];

        foreach ($funcionarios as $funcionario) {
            if (!in_array($funcionario->funcionario_uid, $ad_users)) {
                $funcionarios_destruidos[] = "-{$funcionario->nome} [{$funcionario->departamento->nome_exibicao}]\n";
                Funcionario::destroy($funcionario);
            }
        }
        // se tiver funcionario excluido mostra msg
        if (count($funcionarios_destruidos) > 0) {
            $funcionarios_destruidos = implode("", $funcionarios_destruidos);
            echo "Funcionários excluídos do Banco de dados pois não estão no AD:\n{$funcionarios_destruidos}\n";
        }
    }
}
