<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatefoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 255);
            $table->string('grupo', 255);
            $table->string('subgrupo', 255);
            $table->float('porcentaje_perdida', 7, 2)->nullable()->default(0);

            /* Variables del libro de composición química */
            $table->string('origen')->nullable();
            $table->float('gramos', 7, 2)->nullable();
            $table->float('porcion', 7, 2)->nullable();
            $table->float('humedad', 7, 2)->nullable()->default(0);
            $table->float('energia', 7, 2)->nullable()->default(0);
            $table->float('proteinas', 7, 2)->nullable()->default(0);
            $table->float('carbohidratos', 7, 2)->nullable()->default(0);
            $table->float('grasas_totales', 7, 2)->nullable()->default(0);
            $table->float('fibra', 7, 2)->nullable()->default(0);
            $table->float('a_grasos_sat', 7, 2)->nullable()->default(0);
            $table->float('a_grasos_monosat', 7, 2)->nullable()->default(0);
            $table->float('a_grasos_polisat', 7, 2)->nullable()->default('0');
            $table->float('a_g_omega6', 7, 2)->nullable()->default(0);
            $table->float('a_g_omega3', 7, 2)->nullable()->default(0);
            $table->float('a_g_trans', 7, 2)->nullable()->default(0);
            $table->float('colesterol', 7, 2)->nullable()->default(0);
            $table->float('tiamina', 7, 2)->nullable()->default(0);
            $table->float('riboflavina', 7, 2)->nullable()->default(0);
            $table->float('niacina', 7, 2)->nullable()->default(0);
            $table->float('vit_b6', 7, 2)->nullable()->default(0);
            $table->float('vit_b12', 7, 2)->nullable()->default(0);
            $table->float('acido_folico', 7, 2)->nullable()->default(0);
            $table->float('acido_pantotenico', 7, 2)->nullable()->default(0);
            $table->float('biotina', 7, 2)->nullable()->default(0);
            $table->float('vit_c', 7, 2)->nullable()->default(0);
            $table->float('vit_a', 7, 2)->nullable()->default(0);
            $table->float('vit_e', 7, 2)->nullable()->default(0);
            $table->float('vit_d', 7, 2)->nullable()->default(0);
            $table->float('vit_k', 7, 2)->nullable()->default(0);
            $table->float('calcio', 7, 2)->nullable()->default(0);
            $table->float('fosforo', 7, 2)->nullable()->default(0);
            $table->float('hierro', 7, 2)->nullable()->default(0);
            $table->float('sodio', 7, 2)->nullable()->default(0);
            $table->float('potasio', 7, 2)->nullable()->default(0);
            $table->float('magnesio', 7, 2)->nullable()->default(0);
            $table->float('yodo', 7, 2)->nullable()->default(0);
            $table->float('zinc', 7, 2)->nullable()->default(0);
            $table->float('manganeso', 7, 2)->nullable()->default(0);
            $table->float('selenio', 7, 2)->nullable()->default(0);
            $table->float('cobre', 7, 2)->nullable()->default(0);

            /* Variables de excel  */
            $table->float('lipidos', 7, 2)->nullable()->default(0);
            $table->float('caroteno', 7, 2)->nullable()->default(0);
            $table->float('retinol', 7, 2)->nullable()->default(0);
            $table->float('vit_b1', 7, 2)->nullable()->default(0);
            $table->float('vit_b2', 7, 2)->nullable()->default(0);
            $table->float('folatos', 7, 2)->nullable()->default(0);
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
        Schema::dropIfExists('foods');
    }
}
