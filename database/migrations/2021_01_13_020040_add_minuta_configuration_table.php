<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMinutaConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('minuta_configuration', function (Blueprint $table) {

            $table->integer('id_propiedad')->unsigned();
            $table->foreign('id_propiedad')->references('id')->on('properties')->onDelete('cascade');

            $table->integer('id_minuta')->unsigned()->nullable();
            $table->foreign('id_minuta')->references('id')->on('minutas')->onDelete('cascade');
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
