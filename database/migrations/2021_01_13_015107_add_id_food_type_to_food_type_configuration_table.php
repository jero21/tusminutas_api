<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdFoodTypeToFoodTypeConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('food_type_configuration', function (Blueprint $table) {
            $table->integer('id_tipo_comida')->unsigned();
            $table->foreign('id_tipo_comida')->references('id')->on('food_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_type_configuration', function (Blueprint $table) {
            //
        });
    }
}
