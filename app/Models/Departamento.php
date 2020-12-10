<?php

namespace App\Models;

use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use UuidTrait;
    use SoftDeletes;

    public $incrementing = false;
    protected $primaryKey = 'departamento_uid';
    protected $keyType = 'string';

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
