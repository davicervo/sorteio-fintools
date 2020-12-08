<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->uuid('departamento_uid')->primary();
            $table->string('nome_exibicao', 60);
            $table->string('created_by', 100)->nullable()->default(null);
            $table->timestamp('created_at', 0)->nullable();
            $table->string('updated_by', 100)->nullable()->default(null);
            $table->timestamp('updated_at', 0)->nullable();
            $table->string('deleted_by', 100)->nullable()->default(null);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
