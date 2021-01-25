<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientMinutaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_minuta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('correo')->nullable();
            $table->text('comentario')->nullable();
            $table->boolean('link_activo')->default(1);


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
        Schema::dropIfExists('client_minuta');
    }
}
