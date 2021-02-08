<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientMinutaToMinutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('minutas', function (Blueprint $table) {
            $table->integer('id_minuta_cliente')->unsigned()->nullable();
            $table->foreign('id_minuta_cliente')->references('id')->on('client_minuta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('minuta', function (Blueprint $table) {
            //
        });
    }
}
