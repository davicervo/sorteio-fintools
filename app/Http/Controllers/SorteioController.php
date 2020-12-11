<?php

namespace App\Http\Controllers;

use App\Http\Requests\SorteioRequest;
use App\Models\Brinde;
use App\Models\Sorteio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class SorteioController extends Controller
{
    public function lista(): View
    {
        $resource = Sorteio::query()->latest()->orderBy('titulo')->where('ativo', '=', true);
        $sorteios = $resource->get(); // ordenando pelo mais recente
        return view('welcome', [
            'sorteios' => $sorteios
        ]);
    }

    /**
     * @param string $sorteio_uid
     * @return \Illuminate\Http\JsonResponse
     */
    public function vencedores(string $sorteio_uid)
    {
        $data = Brinde::where('sorteio_uid', $sorteio_uid)->with('funcionario')->whereNotNull("funcionario_uid")->get()->toArray();
        return $this->jsonResponse(200, 'Dados retornados com sucesso!', $data, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request): View
    {
        $resource = Sorteio::query()->latest()->orderBy('titulo');
        if ($request->get('search')) {
            $resource->where('titulo', 'like', '%' . trim($request->get('search')) . '%');
        }
        $sorteios = $resource->paginate(10); // ordenando pelo mais recente
        return view('sorteio.index', [
            'sorteios' => $sorteios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('sorteio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SorteioRequest $request
     * @return RedirectResponse
     */
    public function store(SorteioRequest $request): RedirectResponse
    {
        $data = $request->input();

        $data['ativo'] = 1; // todo sorteio está ativo por padrão?;
        $data['created_by'] = Auth::user()->name;

        $sorteio = Sorteio::create($data);

        Session::flash('success', "Sorteio {$sorteio->titulo} criado com sucesso");
        return redirect()->route('sorteios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Sorteio $sorteio
     * @return \Illuminate\Http\Response
     */
    public function show(Sorteio $sorteio)
    {
        return view('sorteio.show', ["dados" => $sorteio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sorteio $sorteio
     * @return View
     */
    public function edit(Sorteio $sorteio): View
    {
        return view('sorteio.edit', compact('sorteio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SorteioRequest $request
     * @param Sorteio $sorteio
     * @return RedirectResponse
     */
    public function update(SorteioRequest $request, Sorteio $sorteio): RedirectResponse
    {
        try {
            $data = $request->only(['titulo', 'descricao', 'data_sorteio']);
            $data['updated_by'] = Auth::user()->name;
            $sorteio->update($data);

            return redirect()->route('sorteios.index')->with('success', "Sorteio {$sorteio->titulo} editado com sucesso");
        } catch (\PDOException $e) {
            Log::error($e->getMessage());

            return back()->with('danger', 'Ocorreu uma falha ao atualizar.');
        }
    }

    /**
     * @param Sorteio $sorteio
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Sorteio $sorteio)
    {
        if (count($sorteio->brindes) == 0) {
            $sorteio->deleted_by = Auth::user()->name;
            $sorteio->save();
            $sorteio->delete();
            $action = 'message';
            $message = 'Registro removido com sucesso.';
        } else {
            $action = 'error';
            $message = 'Já existe um brinde associado a esse sorteio. <strong>Ação não executada!</strong>';
        }

        return back()->with($action, $message);
    }
}
