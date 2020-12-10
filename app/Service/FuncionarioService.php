<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class FuncionarioService
{
    public static function getFuncionarios()
    {
        $response = Http::get('https://ot-test.herokuapp.com/funcionarios');
        return $response->json();
    }
}
