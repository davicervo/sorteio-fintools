<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sorteio extends Model
{
    use UuidTrait;
    use SoftDeletes;

    public $incrementing = false;
    protected $primaryKey = 'sorteio_uid';
    protected $keyType = 'string';
    protected $table = 'sorteios';

    protected $guarded = ['id'];

    public function getIsAtivoAttribute(){
        return $this->ativo == 1 ? 'Ativo' : 'Inativo';
    }

    public function brindes()
    {
        return $this->hasMany(Brinde::class, 'sorteio_uid', 'sorteio_uid');
    }

}
