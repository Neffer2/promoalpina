<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RegistrosProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_producto', function (Blueprint $table) {
            $table->id();

            // Id factura
            $table->foreignId('factura_id');
            $table->foreign('factura_id')->references('id')->on('registros_factura'); 

            // Id particiapnte
            $table->foreignId('participante_id');
            $table->foreign('participante_id')->references('id')->on('participantes');

            // Id producto 
            $table->foreignId('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');

            $table->decimal('valor', 10, 2);

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
        //
    }
}
