<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minutas', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('id_user')->unsigned()->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->json('totales')->nullable();
            $table->json('comidas');
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
        Schema::dropIfExists('minutas');
    }
}
