<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    use UuidTrait;
    use SoftDeletes;

    public $incrementing = false;
    protected $primaryKey = 'funcionario_uid';
    protected $keyType = 'string';
    protected $table = 'funcionarios';

    protected $appends = ['foto'];

    protected $fillable = [
        'nome',
        'foto',
        'departamento_uid',
        'username',
        'elegivel',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function departamento()
    {
        return $this->hasOne(Departamento::class, 'departamento_uid', 'departamento_uid');
    }

    public function brinde()
    {
        return $this->belongsTo(Brinde::class);
    }

    public function getFotoAttribute()
    {
        $type_img = config('picture.type_img');
        $base_url = url('img/fotos');
        /**
         * Alteração para buscar a foto do team fintools
         */
        if (!empty($this->departamento) && strpos($this->departamento->nome_exibicao, 'FINTOOLS')) {
            $base_url = url('team_fintools');
        }

        return "{$base_url}/{$this->username}{$type_img}";
    }
}
