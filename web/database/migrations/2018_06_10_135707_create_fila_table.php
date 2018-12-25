<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fila', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nome");
            $table->integer("sequencia");
            $table->integer("tempo");
            $table->boolean("enviado");
            $table->timestamp("solicitado")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp("horaEnviada")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
            $table->softDeletes();
        });
        DB::unprepared('CREATE TRIGGER `AtualizarHoraEnviada` BEFORE UPDATE ON `fila` FOR EACH ROW IF new.enviado = 1 THEN set new.HoraEnviada = CURRENT_TIMESTAMP; END IF');
        DB::statement("create view fila_dia as select id,nome,sequencia,tempo,solicitado from fila where tempo > 0 and sequencia > 0 and deleted_at is null and Date(created_at) = CURRENT_DATE order by sequencia asc");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fila');
        DB::unprepared('drop trigger `AtualizarHoraEnviada`');
        DB::statement("Drop view fila_dia");

    }
}
