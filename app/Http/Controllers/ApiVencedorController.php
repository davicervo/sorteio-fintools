<?php


namespace App\Http\Controllers;


use App\Models\Brinde;

class ApiVencedorController extends Controller
{
    public function index(){
        return Brinde::vencedoresSorteio()->get();
    }

    public function show($sorteioUid)
    {
        return Brinde::vencedoresSorteioShow($sorteioUid)->get();
    }

}
