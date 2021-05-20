<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
  
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index() {
    return Property::all();
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function indexCliente() {
    return Property::all();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Property  $property
   * @return \Illuminate\Http\Response
   */
  public function show($id) {

    try {
      return Property::all()->where('id', $id)->first();
    } catch (Exception $e) {
      $data = [
        'errors' => true,
        'msg' => $e->getMessage(),
      ];
      return \Response::json($data, 404);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Property  $property
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Property $property)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Property  $propiedad
   * @return \Illuminate\Http\Response
   */
  public function destroy(Property $property)
  {
    //
  }

  public function actualiza()
  {
    $prop = Property::all();

    foreach ($prop as $key => $value) {
      $propp = Property::where('id', $value->id)->first();
      if ($propp->nombre === 'humedad') {
        $propp->unidad_medida = '%';
        $propp->save();
      }
      else if ($propp->nombre === 'energia') {
        $propp->unidad_medida = 'Kcal';
        $propp->save();
      }
      else if ($propp->nombre === 'proteinas') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'carbohidratos') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'grasas_totales') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'fibra') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'a_grasos_sat') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'a_grasos_monosat') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'a_grasos_polisat') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'a_g_omega6') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'a_g_omega3') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'a_g_trans') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'colesterol') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'tiamina') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'riboflavina') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'niacina') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'vit_b6') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'vit_b12') {
        $propp->unidad_medida = 'ug';
        $propp->save();
      }
      else if ($propp->nombre === 'acido_folico') { 
        $propp->unidad_medida = 'ug';
        $propp->save();
      }
      else if ($propp->nombre === 'acido_pantotenico') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'biotina') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'vit_c') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'vit_a') {
        $propp->unidad_medida = 'ug re';
        $propp->save();
      }
      else if ($propp->nombre === 'vit_e') {
        $propp->unidad_medida = 'ug re';
        $propp->save();
      }
      else if ($propp->nombre === 'vit_d') {
        $propp->unidad_medida = 'mcg';
        $propp->save();
      }
      else if ($propp->nombre === 'vit_k') {
        $propp->unidad_medida = 'mcg';
        $propp->save();
      }
      else if ($propp->nombre === 'calcio') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'fosforo') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'hierro') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'sodio') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'potasio') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'magnesio') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'yodo') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'zinc') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'manganeso') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'selenio') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
      else if ($propp->nombre === 'cobre') {
        $propp->unidad_medida = 'mg';
        $propp->save();
      }
    }
  }
}
