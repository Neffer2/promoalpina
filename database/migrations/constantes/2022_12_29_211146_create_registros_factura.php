<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_factura', function (Blueprint $table) {
            $table->id();
            $table->string('cod_factura')->unique();

            // Id particiapnte
            $table->foreignId('participante_id');
            $table->foreign('participante_id')->references('id')->on('participantes');

            $table->integer('puntos_sumados');
            $table->string('foto_factura');

            // Id user 
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('registros_factura');
    }
}
