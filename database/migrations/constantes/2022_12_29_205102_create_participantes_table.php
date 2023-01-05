<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('document')->unique();
            $table->date('fecha_nacimiento');
            $table->string('email')->unique();
            $table->string('telefono')->unique();
            $table->string('ciudad');
            $table->integer('puntos')->nullable()->default('0');
            $table->string('terms')->default('1');
            $table->string('politica_datos')->default('1');
            $table->string('estado')->default('1');
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
        Schema::dropIfExists('participantes');
    }
}
