<?php

namespace App\Http\Controllers;

use App\Models\Brinde;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrindeController extends Controller
{

    public function __construct() {
        $this->upload_path = 'imagens/brindes';
    }

    // ok
    public function index()
    {
        $brindes = Brinde::all();
        return view('brindes.index', [ "brindes" => $brindes ]);
    }

    // ok
    public function create()
    {
        return view('brindes.create');
    }

    public function store(Request $request)
    {
        // TODO - adicionar select para o sorteio
        // TODO - adicionar imagem.
        $request->validate([
           'nome' => 'required',
           'descricao' => 'required',
           'imagem' => 'image|mimes:jpeg,png,jpg,gif,svg|max:100'
        ]);

        $brinde = new Brinde;
        $brinde->fill([
                "nome" => $request->nome,
                "descricao" => $request->descricao,
                "created_by" => Auth::user()->name
        ]);

        if ($request->has('imagem') ) {
            $timestamp = time();
            $nomeImagem = "{$timestamp}.{$request->imagem->extension()}";
            $brinde->imagem = $nomeImagem;
            $request->imagem->move(public_path($this->upload_path), $nomeImagem);
        }

        $brinde->save();

        return redirect()->to('/brindes')->with('message', 'Brinde criado com sucesso.');
    }

    // TODO adicionar links para sorteio, ganhador se houver e imagem.
    public function show(string $uid)
    {
        $brinde = Brinde::withTrashed()->find($uid);
        return view('brindes.show', [ "brinde" => $brinde ]);
    }

    // ok
    public function edit(string $uid)
    {
        $brinde = Brinde::find($uid);
        return view('brindes.edit', [ "brinde" => $brinde ]);
    }


    public function update(string $uid, Request $request)
    {
        // TODO - adicionar select para o sorteio
        // TODO - adicionar imagem.
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'imagem' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $brinde = Brinde::find($uid);
        $brinde->nome = $request->nome;
        $brinde->descricao = $request->descricao;
        $brinde->updated_by = Auth::user()->name;

        if ($request->has('imagem') ) {

            $this->removeImage($brinde->imagem);

            $timestamp = time();
            $nomeImagem = "{$timestamp}.{$request->imagem->extension()}";
            $brinde->imagem = $nomeImagem;
            $request->imagem->move(public_path($this->upload_path), $nomeImagem);
        }

        $brinde->save();
        return redirect()->to("/brindes/$uid/editar")->with('message', 'Brinde alterado com sucesso.');
    }


    // ok
    public function destroy(string $uid)
    {
        $brinde = Brinde::find($uid);
        $brinde->deleted_by = Auth::user()->name;
        $this->removeImage($brinde->imagem);
        $brinde->imagem = null;
        $brinde->save();
        $brinde->delete();
        return redirect()->to('/brindes')->with('message', 'Brinde removido com sucesso.');
    }


    public function removeImage($img)
    {
        if(\File::exists(public_path("$this->upload_path/$img"))){
            \File::delete(public_path("$this->upload_path/$img"));
        }
    }
}

