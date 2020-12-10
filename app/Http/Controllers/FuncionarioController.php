<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Funcionario::paginate();
        return view('funcionarios.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $funcionario = Funcionario::create($request->all());
            return back()->with('success', "O funcionário {$funcionario->nome} foi criado com sucesso!");
        } catch (\PDOException $e) {
            return back()->with('error', 'Falha ao criar um funcionário');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $uid
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        $funcionario = Funcionario::find($uid);

        if (is_null($funcionario)) {
            abort(404);
        }

        return view('funcionarios.edit', compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $uid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        try {
            $funcionario = Funcionario::findOrFail($uid);
            return back()->with('success', "O funcionário {$funcionario->nome} foi atualizado com sucesso");
        } catch (\PDOException | ModelNotFoundException $e) {
            return back()->with('error', 'Falha ao atualizar o funcionário');
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        try {
            $funcionario = Funcionario::findOrFail($uid);
            $funcionario->delete();
            return $this->jsonResponse(true, 'Deletado com sucesso', [], 200);
        } catch (\PDOException $e) {
            return $this->jsonResponse(true, 'Erro ao deletar', [], 500);
        }
        catch (ModelNotFoundException $e) {
            return $this->jsonResponse(true, 'Nenhum registro encontrado', [], 404);
        }
    }
}
