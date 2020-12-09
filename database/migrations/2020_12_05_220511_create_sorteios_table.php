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
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->timeStamps();
            $table->softDeletes();
            $table->integer('deleted_by')->nullable();
            
            // FK's

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
            
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
