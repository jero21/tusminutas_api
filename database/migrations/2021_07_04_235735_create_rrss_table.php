<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRrssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrss', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');

            $table->integer('id_type_rrss')->unsigned();
            $table->foreign('id_type_rrss')->references('id')->on('type_rrss')->onDelete('cascade');

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
        Schema::dropIfExists('rrss');
    }
}
