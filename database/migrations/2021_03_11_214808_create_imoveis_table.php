<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('imagem')->nullable();
            $table->string('codigo_imovel')->nullable();
            $table->string('finalidade')->nullable();
            $table->string('tipo_imovel')->nullable();
            $table->string('suites')->nullable();
            $table->float('valor')->nullable();
            $table->string('endereco')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade_estado')->nullable();
            $table->string('cep')->nullable();
            $table->text('text')->nullable();
            $table->string('area_util')->nullable();
            $table->string('area_terreno')->nullable();
            $table->string('area_comum')->nullable();
            $table->string('area_total')->nullable();
            $table->string('area_privativa')->nullable();
            $table->string('area_construida')->nullable();
            $table->string('dormitorio')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('vaga_garagem')->nullable();
            $table->integer('status')->nullable();
            $table->dateTime('begin_date')->nullable();
            $table->dateTime('end_date')->nullable();
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
        Schema::dropIfExists('imoveis');
    }
}
