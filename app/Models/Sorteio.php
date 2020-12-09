<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class Sorteio extends Model
{
    use UuidTrait;

    public $incrementing = false;
    protected $primaryKey = 'sorteio_uid';
    protected $keyType = 'string';
    protected $table = 'sorteios';

    protected $guarded = ['id'];

    public function getIsAtivoAttribute(){
        return $this->ativo == 1 ? 'Ativo' : 'Inativo';
    }

}
