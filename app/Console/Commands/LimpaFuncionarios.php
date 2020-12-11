<?php

namespace App\Console\Commands;

use App\Models\Funcionario;
use App\Service\FuncionarioService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

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

        $type_img = config('picture.type_img');

        echo "EXCLUSÃO DE FUNCIONÁRIOS QUE NÃO ESTÃO MAIS NO AD:\n";
        foreach ($funcionarios as $funcionario) {
            if (!in_array($funcionario->funcionario_uid, $ad_users)) {
                $arquivo = "{$funcionario->username}{$type_img}";
                if (Storage::disk('public_fotos')->exists($arquivo)) {
                    Storage::disk('public_fotos')->delete($arquivo);
                }
                Funcionario::destroy($funcionario);
                echo "-{$funcionario->nome} [{$funcionario->departamento->nome_exibicao}] removido.\n";
            }
        }
    }
}
