<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{

    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->uuid('funcionario_uid')->primary();
            $table->string('nome', 60);
            $table->text('foto')->nullable();
            //$table->foreignUuid('funcao_uid')->constrained('funcoes', 'funcao_uid');
            $table->foreignUuid('departamento_uid')->constrained('departamentos', 'departamento_uid');
            $table->boolean('elegivel')->default(false);
            $table->string('created_by', 100)->nullable()->default(null);
            $table->string('updated_by', 100)->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
