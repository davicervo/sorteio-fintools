<?php


namespace App\Http\Controllers;


use App\Models\Brinde;

class VencedorController extends Controller
{
    public function index(){
        $vencedores = Brinde::vencedoresSorteio()->get();

        return view('vencedor.index', compact('vencedores'));
    }
}
