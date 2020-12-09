<?php

namespace App\Http\Controllers;

use App\Http\Requests\Usuario\Store;
use App\Http\Requests\Usuario\Update;
use App\Models\Brinde;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UsuarioController extends Controller
{
    protected $view;
    protected $model;
    protected $fields;

    public function __construct()
    {
        $this->model = new User();
        $this->view = 'usuario';
        $this->view = 'usuario';
        $this->fields = [
            [
                'label' => 'Nome',
                'name' => 'name',
                'type' => 'text'
            ],
            [
                'label' => 'Email',
                'name' => 'email',
                'type' => 'email'
            ],
            [
                'label' => 'Senha',
                'name' => 'password',
                'type' => 'password'
            ],
            [
                'label' => 'Admin',
                'name' => 'is_admin',
                'type' => 'radio',
                'options' => [
                    ['label' => 'Sim', 'value' => 1, 'name' => 'is_admin_sim'],
                    ['label' => 'Não', 'value' => 0, 'name' => 'is_admin_nao']
                ]
            ],
        ];
    }

    /**
     * Retorna a lista de usuarios no sistema
     * @return Factory|View
     */
    public function index()
    {
        $data = $this->model->all();
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
        $data['is_admin'] = array_key_exists('is_admin', $data) ? 1 : 0;

        try {
            $this->model->fill($data)->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Houve um erro interno ao tentar criar esse usuário.');
        }

        return redirect()->back()->with('message', 'Usuário criado com sucesso.');
    }

    /**
     * Atualizando usuario
     * @param int $id
     * @return Factory|View
     */
    public function edit(int $id)
    {
        $data = $this->model->find($id);
        return view($this->view . '.edit', [
            "data" => $data,
            "fields" => $this->fields
        ]);
    }


    /**
     * @param int $id
     * @param Request $request
     * @return Factory|View
     */
    public function update(int $id, Update $request)
    {
        $data = array_filter($request->validated());
        $data['is_admin'] = array_key_exists('is_admin', $data) ? 1 : 0;

        try {
            $this->model->find($id)->fill($data)->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Houve um erro interno ao tentar atualizar esse usuário.');
        }

        return redirect()->back()->with('message', 'Usuário  alterado com sucesso.');
    }


    // ok
    public function destroy(string $uid)
    {
        $brinde = Brinde::find($uid);
        $brinde->deleted_by = Auth::user()->name;
        $brinde->save();
        $brinde->delete();
        return redirect()->to('/brindes')->with('message', 'Brinde removido com sucesso.');
    }
}

