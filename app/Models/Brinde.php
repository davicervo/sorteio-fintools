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


    public function funcionario()
    {
        return $this->hasOne(Funcionario::class, 'funcionario_uid');
    }


    public function sorteio()
    {
        return $this->belongsTo(Sorteio::class, 'sorteio_uid');
    }

    public function scopeVencedoresSorteio($query)
    {
        return $query->select('brindes.nome AS brinde_nome', 'brindes.*', 'funcionarios.*', 'sorteios.*')
            ->join('funcionarios', 'funcionarios.funcionario_uid', 'brindes.funcionario_uid')
            ->join('sorteios', 'sorteios.sorteio_uid', 'brindes.sorteio_uid');
    }

}
