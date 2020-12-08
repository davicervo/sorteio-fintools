<?php

namespace App\Http\Controllers;

use App\Models\Brinde;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrindeController extends Controller
{

    // ok
    public function index()
    {
        $brindes = Brinde::all();
        return view('brinde.index', [ "brindes" => $brindes ]);
    }

    // ok
    public function create()
    {
        return view('brinde.create');
    }

    public function store(Request $request)
    {
        // TODO - adicionar imagem.
        Brinde::create(
            [
                "nome" => $request->nome,
                "descricao" => $request->descricao,
                "created_by" => Auth::user()->name
            ]
        );
        return redirect()->to('/brindes')->with('message', 'Brinde criado com sucesso.');
    }

    public function show(string $uid)
    {
        $brinde = Brinde::find($uid);
        return view('brinde.show', [ "brinde" => $brinde ]);
    }


    public function edit(string $uid)
    {
        $brinde = Brinde::find($uid);
        return view('brinde.edit', [ "brinde" => $brinde ]);
    }


    public function update(string $uid, Request $request)
    {
        // TODO - adicionar imagem.
        $brinde = Brinde::find($uid);
        $brinde->nome = $request->nome;
        $brinde->descricao = $request->descricao;
        $brinde->updated_by = Auth::user()->name;
        $brinde->save();
        return redirect()->to("/brindes/$uid/editar")->with('message', 'Brinde alterado com sucesso.');
    }



    public function destroy(string $uid)
    {
        $brinde = Brinde::find($uid);
        $brinde->deleted_by = Auth::user()->name;
        $brinde->save();
        $brinde->delete();
        return redirect()->to('/brindes')->with('message', 'Brinde removido com sucesso.');
    }
}

