<?php

namespace App\Models;


use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    use UuidTrait;

    public $incrementing = false;
    protected $primaryKey = 'funcao_uid';
    protected $keyType = 'string';
    protected $table = 'funcoes';

    protected $fillable = [
        'nome_exibicao',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class, 'funcionario_uid', 'funcionario_uid');
    }
}
