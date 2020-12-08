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

    $table->uuid('funcionario_uid')->primary();
            $table->string('nome', 60);
            $table->text('foto');
            $table->foreignUuid('funcao_uid')->constrained('funcoes', 'funcao_uid');
            $table->foreignUuid('departamento_uid')->constrained('departamentos', 'departamento_uid');
            $table->boolean('elegivel')->default(false);
            $table->string('created_by', 100)->nullable()->default(null);
            $table->timestamp('created_at', 0)->nullable();
            $table->string('updated_by', 100)->nullable()->default(null);
            $table->timestamp('updated_at', 0)->nullable();
            $table->string('deleted_by', 100)->nullable()->default(null);
            $table->softDeletes();

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

    public function funcao()
    {
        return $this->hasOne(Departamento::class, 'departamento_uid', 'departamento_uid');
    }
}
