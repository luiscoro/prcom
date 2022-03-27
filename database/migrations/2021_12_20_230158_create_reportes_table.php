<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->longText('comentario')->nullable();
            $table->string('motivo');
            $table->unsignedBigInteger('anuncio_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}
