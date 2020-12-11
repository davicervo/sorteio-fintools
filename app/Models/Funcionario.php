<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use App\Models\Departamento;
use App\Support\Fotos;
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
        return url('img/default.png');//(new Fotos())->getFoto($this);
    }
}
