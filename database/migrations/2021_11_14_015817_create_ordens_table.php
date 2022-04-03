<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->string('fecha_orden')->nullable();
            $table->decimal('subtotal')->default(0);
            // $table->string('dni',10);
            $table->integer('cantidad_creditos');
            $table->string('nombre_completo');
            $table->string('telefono')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            // $table->unsignedBigInteger('credito_id')->nullable();
            // $table->foreign('credito_id')->references('id')->on('creditos');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordens');
    }
}
