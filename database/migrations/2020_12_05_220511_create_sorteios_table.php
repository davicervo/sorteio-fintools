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
        });
    }


    public function down()
    {
        Schema::dropIfExists('sorteios');
    }
}
