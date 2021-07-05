<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenguageLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lenguage_level', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nivel_manejo')->nullable();

            $table->integer('id_lenguage')->unsigned();
            $table->foreign('id_lenguage')->references('id')->on('lenguage')->onDelete('cascade');

            $table->integer('id_profile')->unsigned();
            $table->foreign('id_profile')->references('id')->on('profile')->onDelete('cascade');

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
        Schema::dropIfExists('lenguage_level');
    }
}
