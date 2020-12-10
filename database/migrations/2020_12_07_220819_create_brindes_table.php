<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrindesTable extends Migration
{

    public function up()
    {
        Schema::create('brindes', function (Blueprint $table) {
            $table->uuid('brinde_uid')->primary();
            $table->uuid('sorteio_uid')->nullable()->default(null);
            $table->uuid('funcionario_uid')->nullable()->default(null);
            $table->string('nome', 255);
            $table->text('descricao')->nullable()->default(null);
            $table->text('imagem')->nullable()->default(null);
            $table->string('created_by', 100)->nullable()->default(null);
            $table->timestamp('created_at', 0)->nullable();
            $table->string('updated_by', 100)->nullable()->default(null);
            $table->timestamp('updated_at', 0)->nullable();
            $table->string('deleted_by', 100)->nullable()->default(null);
            $table->timestamp('deleted_at', 0)->nullable();
            $table->foreign('funcionario_uid')->references('funcionario_uid')->on('funcionarios');
            $table->foreign('sorteio_uid')->references('sorteio_uid')->on('sorteios');
        });
    }

    public function down()
    {
        Schema::dropIfExists('brindes');
    }
}
