<?php


namespace App\Http\Controllers;


use App\Models\Brinde;

class ApiVencedorController extends Controller
{
    public function index(){
        return Brinde::vencedoresSorteio()->get();
    }

}
