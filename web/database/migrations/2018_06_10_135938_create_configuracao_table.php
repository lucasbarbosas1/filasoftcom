<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfiguracaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracao', function (Blueprint $table) {
            $table->increments('id');
            $table->string("dbHost",'255','')->nullable();
            $table->string("dbPort",'255','')->nullable();
            $table->string("dbUser",'255','')->nullable();
            $table->string("dbPass",'255','')->nullable();
            $table->string("dbDatabase",'255','')->nullable();
            $table->boolean("filaAtiva");
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
        Schema::dropIfExists('configuracao');
    }
}
