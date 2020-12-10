<?php

namespace App\Http\Controllers;

use App\Models\Brinde;
use App\Models\Sorteio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrindeController extends Controller
{

    public function __construct() {
        $this->upload_path = 'imagens/brindes';
    }

    public function index()
    {
        $brindes = Brinde::with('sorteio')->get();
        return view('brindes.index', compact('brindes'));
    }

    public function create()
    {
        $sorteios = Sorteio::select('sorteio_uid','titulo')->where('ativo', 1)->get();
        return view('brindes.create')->with(compact('sorteios'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'nome' => 'required',
           'sorteio' => 'required',
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

        $brinde->sorteio()->associate($request->sorteio);
        $brinde->save();

        return redirect()->to('/brindes')->with('message', 'Brinde criado com sucesso.');
    }


    public function show(string $uid)
    {
        $brinde = Brinde::withTrashed()->with('sorteio', 'funcionario')->find($uid);
        return view('brindes.show', compact('brinde'));
    }


    public function edit(string $uid)
    {
        $brinde = Brinde::with('sorteio', 'funcionario')->find($uid);
        $sorteios = Sorteio::select('sorteio_uid', 'titulo')->where('ativo', 1)->get();
        return view('brindes.edit', compact('brinde', 'sorteios'));
    }


    public function update(string $uid, Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'sorteio' => 'required',
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

        $brinde->sorteio()->associate($request->sorteio);
        $brinde->save();
        return redirect()->to("/brindes/$uid/editar")->with('message', 'Brinde alterado com sucesso.');
    }


    public function destroy(string $uid)
    {
        $brinde = Brinde::find($uid);

        if (!empty($brinde->funcionario_uid)) {
            return redirect()->to('/brindes')->with('message', 'Não é possível remover brinde com ganhador.');
        }
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

    public function adicionarGanhador($uidBrinde, $uidFuncionario)
    {
        $brinde = Brinde::find($uidBrinde);
        $brinde->funcionario_uid = $uidFuncionario;
        $brinde->save();
        return $this->jsonResponse(["success"]);
    }
}

