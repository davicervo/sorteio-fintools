<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use App\Models\Funcao;
use App\Models\Departamento;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use UuidTrait;

    public $incrementing = false;
    protected $primaryKey = 'funcionario_uid';
    protected $keyType = 'string';
    protected $table = 'funcionarios';

    protected $fillable = [
        'nome',
        'foto',
        'funcao_uid',
        'departamento_uid',
        'elegivel',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    public function funcao()
    {
        return $this->hasOne(Funcao::class, 'funcao_uid', 'funcao_uid');
    }

    public function departamento()
    {
        return $this->hasOne(Departamento::class, 'departamento_uid', 'departamento_uid');
    }
}
