<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->increments('codigo');
            $table->string("nome");
            $table->string("turno");
            $table->time("inicioIntervalo");
            $table->time("fimIntervalo");
            $table->smallInteger("countDez")->default(0);
            $table->smallInteger("countVinte")->default(0);
            $table->smallInteger("tipoHorario")->default(1);
            $table->boolean("dobrando")->default(false);
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
        Schema::dropIfExists('funcionario');
    }
}
