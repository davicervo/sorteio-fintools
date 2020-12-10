<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brinde extends Model
{
    use UuidTrait;
    use SoftDeletes;

    public $incrementing = false;
    protected $primaryKey = 'brinde_uid';
    protected $keyType = 'string';
    protected $table = 'brindes';

    protected $fillable = [
        'sorteio_uid',
        'funcionario_uid',
        'nome',
        'descricao',
        'imagem',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    /**
     * Relação de 1 : 1 com funcionário.
     */
    public function funcionario()
    {
        return $this->hasOne('App\Models\Funcionario');
    }


    /**
     * Relação de 1 sorteio : n brindes.
     */
    public function sorteio()
    {
        return $this->belongsTo('App\Models\Sorteio', 'sorteio_uid');
    }

}
