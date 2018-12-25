<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterConfiguracaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table("configuracao",function(Blueprint $table){
            $table->string("versaoFila")->after("filaAtiva")->default("0.0.0");
            $table->integer("esperaPainel")->after("versaoFila")->default(0);
            $table->integer("esperaDesktop")->after("esperaPainel")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table("configuracao",function(Blueprint $table){
            $table->dropColumn(["versaoFila","esperaPainel","esperaDesktop"]);
        });
    }
}
