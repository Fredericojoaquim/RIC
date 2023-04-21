<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetadados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metadados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('trabalho_id')->unsigned();
            $table->string('titulo');
            $table->string('autor');
            $table->string('orientador');
            $table->string('lingua');
            $table->date('data_criacao');
            $table->string('local');
            $table->text('resumo');
            $table->text('fontes');
            $table->foreign('trabalho_id')->references('id')->on('trabalhos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metadados');
    }
}
