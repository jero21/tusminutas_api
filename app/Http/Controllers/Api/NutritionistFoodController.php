<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NutritionistFood;
use Illuminate\Http\Request;

class NutritionistFoodController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
      $user = \JWTAuth::parseToken()->authenticate();
      return NutritionistFood::where('id_user', $user->id)->get();
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
      $user = \JWTAuth::parseToken()->authenticate();
      if (!is_array($request->all())) {
          return ['error' => 'request must be an array'];
      }

      $rules = [
          'nombre' => 'required',
          'grupo' => 'required',
          'subgrupo' => 'required',
      ];

      try {
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
          return [
            'created' => false,
            'errors' => $validator->errors()->all(),
          ];

        } else {
          $alimento_nut = new NutritionistFood();

          $alimento_nut->nombre           = $request->nombre;
          $alimento_nut->grupo            = $request->grupo;
          $alimento_nut->subgrupo         = $request->subgrupo;
          $alimento_nut->porcentaje_perdida = $request->porcentaje_perdida;
          $alimento_nut->origen           = $request->origen;
          $alimento_nut->gramos           = $request->gramos;
          $alimento_nut->porcion          = $request->porcion;
          $alimento_nut->humedad          = $request->humedad;
          $alimento_nut->energia          = $request->energia;
          $alimento_nut->proteinas        = $request->proteinas;
          $alimento_nut->carbohidratos    = $request->carbohidratos;
          $alimento_nut->grasas_totales   = $request->grasas_totales;
          $alimento_nut->fibra            = $request->fibra;
          $alimento_nut->a_grasos_sat     = $request->a_grasos_sat;
          $alimento_nut->a_grasos_monosat = $request->a_grasos_monosat;
          $alimento_nut->a_grasos_polisat = $request->a_grasos_polisat;
          $alimento_nut->a_g_omega6       = $request->a_g_omega6;
          $alimento_nut->a_g_omega3       = $request->a_g_omega3;
          $alimento_nut->a_g_trans        = $request->a_g_trans;
          $alimento_nut->colesterol       = $request->colesterol;
          $alimento_nut->tiamina          = $request->tiamina;
          $alimento_nut->riboflavina      = $request->riboflavina;
          $alimento_nut->niacina          = $request->niacina;
          $alimento_nut->vit_b6           = $request->vit_b6;
          $alimento_nut->vit_b12          = $request->vit_b12;
          $alimento_nut->acido_folico     = $request->acido_folico;
          $alimento_nut->acido_pantotenico = $request->acido_pantotenico;
          $alimento_nut->biotina           = $request->biotina;
          $alimento_nut->vit_c            = $request->vit_c;
          $alimento_nut->vit_a            = $request->vit_a;
          $alimento_nut->vit_e            = $request->vit_e;
          $alimento_nut->vit_d            = $request->vit_d;
          $alimento_nut->vit_k            = $request->vit_k;
          $alimento_nut->calcio           = $request->calcio;
          $alimento_nut->fosforo          = $request->fosforo;
          $alimento_nut->hierro           = $request->hierro;
          $alimento_nut->sodio            = $request->sodio;
          $alimento_nut->potasio          = $request->potasio;
          $alimento_nut->magnesio         = $request->magnesio;
          $alimento_nut->yodo             = $request->yodo;
          $alimento_nut->zinc             = $request->zinc;
          $alimento_nut->manganeso        = $request->manganeso;
          $alimento_nut->selenio          = $request->selenio;
          $alimento_nut->cobre            = $request->cobre;
          $alimento_nut->id_user          = $user->id;
          
          $alimento_nut->save();

          return ['created' => true];
        }
      } catch (Exception $e) {
        \Log::info('Error creating user: ' . $e);
        return \Response::json(['created' => false], 500);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NutritionistFood  $nutritionistFood
     * @return \Illuminate\Http\Response
     */
    public function show(NutritionistFood $nutritionistFood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NutritionistFood  $nutritionistFood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NutritionistFood $nutritionistFood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NutritionistFood  $nutritionistFood
     * @return \Illuminate\Http\Response
     */
    public function destroy(NutritionistFood $nutritionistFood)
    {
        //
    }
}
