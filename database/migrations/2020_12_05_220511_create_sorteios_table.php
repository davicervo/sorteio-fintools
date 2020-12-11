<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSorteiosTable extends Migration
{

    public function up()
    {
        Schema::create('sorteios', function (Blueprint $table) {
            $table->uuid('sorteio_uid')->primary();
            $table->string('titulo');
            $table->text('descricao');
            $table->date('data_sorteio');
            $table->boolean('ativo');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timeStamps();
            $table->softDeletes();

            // FK's

            // Indexs
            $table->index('titulo');
            $table->index('data_sorteio');
            $table->index('ativo');
            $table->index('created_by');
            $table->index('updated_by');
            $table->index('deleted_by');
        });
    }


    public function down()
    {
        Schema::dropIfExists('sorteios');
    }
}
