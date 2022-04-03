<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('ciudad')->nullable();
            $table->text('direccion')->nullable();
            $table->string('titulo')->nullable();
            $table->string('estado')->default('activado');
            $table->longtext('descripcion')->nullable();
            $table->string('zona')->nullable();
            $table->dateTime('reactivacion',$precision = 0)->nullable();
          

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias')
            ->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedBigInteger('paquete_id')->nullable();
            $table->foreign('paquete_id')->references('id')->on('paquetes')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('anuncios');
    }
}
