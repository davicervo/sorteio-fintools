<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Funcionario;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FuncionarioController extends Controller
{
    protected $fields;

    public function __construct()
    {
        $this->fields = [
            [
                'label' => 'Nome',
                'name' => 'nome',
                'type' => 'text'
            ],
            [
                'label' => 'Departamento',
                'name' => 'departamento_uid',
                'type' => 'select',
                'option_name' => 'nome_exibicao',
                'option_value' => 'departamento_uid',
                'options' => Departamento::orderBy('nome_exibicao')->get()
            ],
            [
                'label' => 'Participa do sorteio?',
                'name' => 'elegivel',
                'type' => 'radio',
                'options' => [
                    ['label' => 'Sim', 'value' => 1, 'name' => 'elegivel'],
                    ['label' => 'Não', 'value' => 0, 'name' => 'elegivel']
                ]
            ],
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $resource = Funcionario::orderBy('nome');
        if ($request->get('search')) {
            $resource->where('nome', 'like', '%' . trim($request->get('search')) . '%')->orWhereHas('departamento', function ($query) use ($request) {
                return $query->where('nome_exibicao', 'like', '%' . trim($request->get('search')) . '%');
            });
        }
        $data = $resource->paginate();
        return view('funcionarios.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionarios.create', ['fields' => $this->fields]);
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
            $funcionario = Funcionario::create($request->all() + ['created_by' => Auth::user()->name]);
            return back()->with('message', "O funcionário {$funcionario->nome} foi criado com sucesso!");
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
    public function edit(string $uid)
    {
        $funcionario = Funcionario::find($uid);

        if (is_null($funcionario)) {
            abort(404);
        }

        return view('funcionarios.edit', [
            "data" => $funcionario,
            "fields" => $this->fields
        ]);
    }

    public function show(string $uid)
    {
        $funcionario = Funcionario::find($uid);

        if (is_null($funcionario)) {
            abort(404);
        }

        return view('funcionarios.show', [
            "dados" => $funcionario,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $uid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $uid)
    {
        try {
            $funcionario = Funcionario::findOrFail($uid);
            $funcionario->update($request->all() + ['updated_by' => Auth::user()->name]);
            return back()->with('message', "O funcionário {$funcionario->nome} foi atualizado com sucesso");
        } catch (\PDOException | ModelNotFoundException $e) {
            return back()->with('error', 'Falha ao atualizar o funcionário');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $uid
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $uid)
    {
        try {
            $funcionario = Funcionario::findOrFail($uid);
            $funcionario->update([
                'deleted_by' => Auth::user()->name
            ]);
            $funcionario->delete();
            return response()->redirectToRoute('funcionarios.index')->with('message', 'Deletado com sucesso');
        } catch (\PDOException $e) {
            return response()->redirectToRoute('funcionarios.index')->with('error', 'Erro ao deletar');
        } catch (ModelNotFoundException $e) {
            return response()->redirectToRoute('funcionarios.index')->with('error', 'Nenhum registro encontrado');
        }
    }

    /**
     * @param int $qtd
     * @param string $sorteioUid
     * @return array
     */
    public function getByChunk(int $qtd, string $sorteioUid)
    {
        try {
            $funcionarios = new Funcionario();
            $qtd = $qtd > 1 ? $qtd : 1;

            $result = $funcionarios->with(['departamento' => function ($query) {
                $query->selectRaw('departamento_uid, nome_exibicao');
            }])
                ->whereNotIn('funcionario_uid', function ($query) use ($funcionarios, $sorteioUid) {
                    $query->select('funcionario_uid')
                        ->from($funcionarios->brinde()->getRelated()->getTable())
                        ->where('sorteio_uid', $sorteioUid)
                        ->whereRaw('funcionario_uid is not null');
                })
                ->selectRaw('funcionario_uid, nome, departamento_uid, username')
                ->where('elegivel', '=', true)
                ->orderBy('nome')->get();
            $chunk = array_chunk($result->shuffle()->toArray(), $qtd);
            return $this->jsonResponse(
                true,
                'Dados retornados com sucesso.',
                [
                    "chunk" => $chunk
                ]
            );
        } catch (Exception $e) {
            return $this->jsonResponse(false, 'Não foi possível retornar o chunk de funcionários.', [
                'exception' => [
                    'message' => $e->getMessage(),
                    'code' => $e->getCode()
                ]
            ], 500);
        }
    }
}
