<?php

namespace App\Http\Controllers;

use App\Http\Requests\Departamento\Store;
use App\Http\Requests\Departamento\Update;
use App\Models\Departamento;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DepartamentosController extends Controller
{
    protected $view = 'departamento';
    protected $model;
    protected $fields;

    public function __construct()
    {
        $this->model = new Departamento();
        $this->fields = [
            [
                'label' => 'Nome',
                'name' => 'nome_exibicao',
                'type' => 'text'
            ]
        ];
    }

    /**
     * Retorna a lista de departamentos no sistema
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $resource = $this->model->orderBy('nome_exibicao');
        if($request->get('search')){
            $resource->where('nome_exibicao', 'like', '%' . trim($request->get('search')) . '%');
        }
        $data = $resource->paginate();
        return view($this->view . '.index', ["data" => $data]);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view($this->view . '.create', [
            'fields' => $this->fields
        ]);
    }

    /**
     * Criacao de usuario
     * @param Store $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Store $request)
    {
        $data = array_filter($request->validated());

        try {
            $this->model->fill($data)->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Houve um erro interno ao tentar criar esse usuário.');
        }

        return redirect()->to('/departamentos')->with('message', 'Usuário criado com sucesso.');
    }

    /**
     * Atualizando usuario
     * @param string $uid
     * @return Factory|View
     */
    public function edit(string $uid)
    {
        $data = $this->model->find($uid);
        return view($this->view . '.edit', [
            "data" => $data,
            "fields" => $this->fields
        ]);
    }


    /**
     * @param string $uid
     * @param Update $request
     * @return Factory|View
     */
    public function update(string $uid, Update $request)
    {
        $data = array_filter($request->validated());

        try {
            $this->model->find($uid)->fill($data)->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Houve um erro interno ao tentar atualizar esse registro.');
        }

        return redirect()->to('/departamentos')->with('message', 'registro  alterado com sucesso.');
    }


    // ok
    public function destroy(string $uid)
    {
        //if($uid !== 1) {
            $result = $this->model->find($uid);
            $result->deleted_by = Auth::user()->name;
            $result->save();
            $result->delete();
            return redirect()->to('/departamentos')->with('message', 'Registro removido com sucesso.');
        //}
        //return redirect()->to('/departamentos')->with('message', 'Registro não permitido.');
    }

    public function show(string $uid)
    {
        return view($this->view . '.show', [ "dados" => $this->model->find($uid) ]);
    }
}

