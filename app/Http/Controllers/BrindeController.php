<?php

namespace App\Http\Controllers;

use App\Models\Brinde;
use App\Models\Funcionario;
use App\Models\Sorteio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BrindeController extends Controller
{
    public function index(Request $request)
    {
        $resource = Brinde::with('sorteio')->orderBy('nome');
        if ($request->get('search')) {
            $resource->where('nome', 'like', '%' . trim($request->get('search')) . '%');
        }
        $brindes = $resource->paginate();
        return view('brindes.index', compact('brindes'));
    }

    public function create()
    {
        $sorteios = Sorteio::select('sorteio_uid', 'titulo')->where('ativo', 1)->get();
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

        $brinde = $this->saveImage($request, $brinde);

        $brinde->sorteio()->associate($request->sorteio);
        $brinde->save();

        return redirect()->to('/brindes')->with('message', 'Prêmio criado com sucesso.');
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

        if (!is_null($brinde->funcionario_uid)) {
            return back()->with('error', "Não é possível editar um prêmio que tenha um ganhador.");
        }

        $brinde->nome = $request->nome;
        $brinde->descricao = $request->descricao;
        $brinde->updated_by = Auth::user()->name;

        $brinde = $this->saveImage($request, $brinde);

        $brinde->sorteio()->associate($request->sorteio);
        $brinde->save();
        return redirect()->to("/brindes/$uid/editar")->with('message', 'Prêmio alterado com sucesso.');
    }


    public function destroy(string $uid)
    {
        $brinde = Brinde::find($uid);

        if (empty($brinde->funcionario_uid)) {
            $brinde->deleted_by = Auth::user()->name;
            $this->removeImage($brinde->imagem);
            $brinde->imagem = null;
            $brinde->save();
            $brinde->delete();
            $action = 'message';
            $message = 'Brinde removido com sucesso.';
        } else {
            $action = 'error';
            $message = 'Registro não pode ser deletado pois já existe um ganhador vinculado.';
        }

        return redirect()->to('/brindes')->with($action, $message);
    }

    public function saveImage(Request $request, Brinde $brinde)
    {
        if ($request->has('imagem')) {

            $this->removeImage($brinde->imagem);

            $timestamp = time();
            $nomeImagem = "{$timestamp}.{$request->imagem->extension()}";

            Storage::disk('public_brindes')->put($nomeImagem, $request->file('imagem')->getContent());

            $brinde->imagem = $nomeImagem;
        }

        return $brinde;
    }

    public function removeImage($img)
    {
        $storage = Storage::disk('public_brindes');
        if ($storage->exists($img)) {
            $storage->delete($img);
        }
    }

    public function adicionarGanhador(string $brindeUid)
    {
        $brinde = Brinde::find($brindeUid);
        $funcionarios = Funcionario::where('elegivel', 1)->get();

        if (count($funcionarios) > 0) {
            $funcionario = $funcionarios->random();
            $brinde->funcionario_uid = $funcionario->funcionario_uid;
            $brinde->save();

            return $this->jsonResponse(
                true,
                'Dados retornados com sucesso.',
                [
                    "funcionario_uid" => $funcionario->funcionario_uid,
                    "nome" => $funcionario->nome,
                    "username" => $funcionario->username,
                    "departamento_uid" => $funcionario->departamento_uid,
                    "foto" => $funcionario->foto
                ]
            );
        } else {
            return $this->jsonResponse(false, 'Não existem funcionários elegíveis.');
        }
    }

    /**
     * Clone de brinde
     * @param string $brindeUid
     * @param int $brindes
     * @return \Illuminate\Http\JsonResponse
     */
    public function cloneBrinde(string $brindeUid, int $brindes = 0)
    {
        if ($brindes < 1) {
            return $this->jsonResponse(true, 'Nenhum prêmio foi gerado.');
        }
        $brinde = Brinde::find($brindeUid);

        //clonando os brindes
        for ($i = 0; $i < $brindes; $i++) {
            $clone = $brinde->replicate()->fill([
                'funcionario_uid' => null
            ]);
            $clone->save();
        }

        return $this->jsonResponse(true, 'Dados retornados com sucesso.', [
            'brinde_uid' => $brindeUid,
            'qtd' => $brindes
        ]);
    }

    /**
     * Envia uma lista de brindes agrupados para o front
     * @param string $sorteio_uid
     * @return \Illuminate\Http\JsonResponse
     */
    public function listForSelect(string $sorteio_uid)
    {
        $sorteio = Sorteio::find($sorteio_uid);
        $brindes = Brinde::orderBy('nome')->where('sorteio_uid', $sorteio_uid)
            ->whereNull('funcionario_uid')->pluck('nome', 'brinde_uid')->unique()
            ->all();

        return $this->jsonResponse(true, 'Dados retornados com sucesso.', [
            'brindes' => $brindes,
            'sorteio' => $sorteio->titulo ?? null
        ]);
    }
}
