<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use App\Models\Departamento;
use App\Support\Fotos;
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


    protected $fillable = [
        'nome',
        'foto',
        'departamento_uid',
        'elegivel',
        'created_by',
        'updated_by',
        'deleted_by',
        'brinde_uid'
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

        /**
         * Alteração para buscar a foto do team fintools
         */
        if (strpos($this->departamento->nome_exibicao, 'FINTOOLS')) {
            return url('team_fintools') . '/' . $this->username . $type_img;
        }
        return url('img/fotos') . '/' . $this->username . $type_img;
    }
}
