<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTypeConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_type_configuration', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_configuracion_minuta')->unsigned();
            $table->foreign('id_configuracion_minuta')->references('id')->on('minuta_configuration');
            
            $table->integer('cant_maxima');
            $table->double('porcentaje');
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
        Schema::dropIfExists('food_type_configuration');
    }
}
