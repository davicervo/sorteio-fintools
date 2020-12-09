<?php

namespace App\Http\Controllers;

use App\Http\Requests\SorteioRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Sorteio;
use Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Session;

class SorteioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $sorteios = Sorteio::query()->latest()->paginate(10); // ordenando pelo mais recente
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
        //
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
            $sorteio->update($request->only(['titulo', 'descricao', 'data_sorteio']));

            return redirect()->route('sorteios.index')->with('success', "Sorteio {$sorteio->titulo} criado com sucesso");
        } catch (\PDOException $e) {
            Log::error($e->getMessage());

            return back()->with('success', 'Ocorreu uma falha ao atualizar.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sorteio $sorteio)
    {
        //
    }
}
