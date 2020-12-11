<?php

namespace App\Console\Commands;

use App\Models\Funcionario;
use App\Support\Fotos;
use Illuminate\Console\Command;

class ImportaFuncionariosFotos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'funcionarios:importPhotos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importação de fotos dos funcionários';

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
        echo "IMPORTAÇÃO DE FOTOS DOS FUNCIONÁRIOS:\n";
        $funcionarios = Funcionario::get();
        foreach ($funcionarios as $funcionario) {
            (new Fotos)->downloadFoto($funcionario);
        }
    }
}
