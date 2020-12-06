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
        });
    }


    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
