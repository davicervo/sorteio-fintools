<?php

namespace App\Http\Controllers;

use App\Models\Brinde;
use Illuminate\Http\Request;

class BrindeController extends Controller
{

    public function index()
    {
        $brindes = Brinde::all();
        return view('brinde.index', [ "brindes" => $brindes ]);
    }

    public function create()
    {
        return view('brinde.create');
    }

    public function store(Request $request)
    {
        Brinde::create($request->all());
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
        $brinde = Brinde::find($uid);
        // parâmetros do request
        $brinde->save();
    }


    public function destroy(string $uid)
    {
        Brinde::destroy($uid);
    }
}

