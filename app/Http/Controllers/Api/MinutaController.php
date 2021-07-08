<?php

namespace App\Http\Controllers\Api;

use Input;
use App\Models\Minuta;
use App\Models\User;
use App\Models\ClientMinuta;
use App\Models\MinutaConfiguration;
use App\Models\FoodTypeConfiguration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Exports\MinutaExport;
use Maatwebsite\Excel\Facades\Excel;

class MinutaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $user = JWTAuth::parseToken()->authenticate();
    return Minuta::where('id_user', $user->id)->get();
  }

  public function indexCliente($uuid) {
    $minuta =  Minuta::where('uuid', $uuid)->first();
    $minuta->patient = ClientMinuta::find($minuta->id_minuta_cliente);

    return $minuta;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $user = JWTAuth::parseToken()->authenticate();
    $minuta = new Minuta;
    
    if (!is_array($request->all())) {
      return ['error' => 'request must be an array'];
    }
    $rules = ['nombre' => 'required'];

    try {
      $validator = \Validator::make($request->all(), $rules);
      if ($validator->fails()) {
        return \Response::json([
          'created' => false,
          'errors' => $validator->errors()->all(),
        ], 500);

      } else { 
        $minuta->nombre         = $request->nombre;
        $minuta->descripcion    = $request->descripcion;
        $minuta->comidas        = $request->comidas;
        $minuta->id_user        = $user->id;
        //$minuta->id_tipo_minuta = $request->id_tipo_minuta;
        $minuta->save();

        $configuracion = $request->configuracion;

        foreach ($configuracion as $propiedad) {
          $minuta_config = new MinutaConfiguration();
          $minuta_config->id_minuta       = $minuta->id;
          $minuta_config->id_propiedad    = $propiedad['id_propiedad'];
          $minuta_config->cant_maxima     = $propiedad['cant_maxima'];
          $minuta_config->save();

          $configuracion_comidas = $propiedad['configuracion_platos'];

          foreach ($configuracion_comidas as $comidas) {
            if (isset($comidas['porcentaje'])) {
              $comidas_config = new FoodTypeConfiguration();

              $comidas_config->id_configuracion_minuta    = $minuta_config->id;
              $comidas_config->id_tipo_comida             = $comidas['id_tipo_comida'];
              $comidas_config->cant_maxima                = $comidas['cant_maxima'];
              $comidas_config->porcentaje                 = $comidas['porcentaje'];
              $comidas_config->save();
            }
          }
        }
        
        return ['created' => true, 'minuta' => $minuta];
      }

    } catch (Exception $e) {
      \Log::info('Error creating user: ' . $e);
      return \Response::json(['created' => false], 500);
    }
  }

  public function minutaCliente(Request $request) {
    if (!is_array($request->all())) {
      return ['error' => 'request must be an array'];
    }
    try {

      $minuta = Minuta::where('id', $request->id_minuta)->first();

      if ($minuta->id_minuta_cliente === null) {
        $cliente = new ClientMinuta;
        $cliente->nombre      = $request->nombre;
        $cliente->correo      = $request->correo;
        $cliente->comentario  = $request->comentario;
        $cliente->save();

        $minuta->id_minuta_cliente = $cliente->id;
        $minuta->save();
      } else {
        $cliente = ClientMinuta::where('id', $minuta->id_minuta_cliente)->first();
        $cliente->nombre      = $request->nombre;
        $cliente->correo      = $request->correo;
        $cliente->comentario  = $request->comentario;
        $cliente->save();
      }
      
      return ['created' => true];

    } catch (Exception $e) {
      \Log::info('Error creating user: ' . $e);
      return \Response::json(['created' => false], 500);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Minuta  $minuta
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    try {
      $minuta = Minuta::with([
          'configuracionMinutas.propiedad',
          'configuracionMinutas.configuracionTipoComida.tipoComida',
          'tipoMinuta:nombre'])
        ->where('id', $id)
        ->first();

      $minuta->patient = ClientMinuta::find($minuta->id_minuta_cliente);
      return $minuta;

    } catch (Exception $e) {
      $data = [
      'errors' => true,
      'msg' => $e->getMessage(),
      ];
      return \Response::json($data, 404);
    }
  }

  public function showCliente($uuid) {
    try {
      $minuta = Minuta::with([
          'configuracionMinutas.propiedad',
          'configuracionMinutas.configuracionTipoComida.tipoComida',
          'tipoMinuta:nombre'])
        ->where('uuid', $uuid)
        ->first();

      $minuta->patient = ClientMinuta::find($minuta->id_minuta_cliente);
      $minuta->user = User::find($minuta->id_user);

      return $minuta;
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
   * @param  \App\Models\Minuta  $minuta
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {

    if (!is_array($request->all())) {
      return ['error' => 'request must be an array'];
    }

    $rules = [
      'nombre' => 'required',
      'comidas' => 'required',
      'id_user' => 'required',
    ];

    try {
      $validator = \Validator::make($request->all(), $rules);
      if ($validator->fails()) {
        return [
        'created' => false,
        'errors' => $validator->errors()->all(),
        ];

      } else {
        $minute = Minuta::findOrFail($id);
        $minute->update($request->all());

        $configuracion = $request->configuracion;
        
        $current_configurations = MinutaConfiguration::where('id_minuta', $minute->id)->get();

        foreach($current_configurations as $current_configuration) {
          FoodTypeConfiguration::where('id_configuracion_minuta', $current_configuration->id)->delete();
          $current_configuration->delete();
        }

        foreach ($configuracion as $propiedad) {
          $minuta_config = new MinutaConfiguration();
          $minuta_config->id_minuta       = $minute->id;
          $minuta_config->id_propiedad    = $propiedad['id_propiedad'];
          $minuta_config->cant_maxima     = $propiedad['cant_maxima'];
          $minuta_config->save();

          $configuracion_comidas = $propiedad['configuracion_platos'];

          foreach ($configuracion_comidas as $comidas) {
            if (isset($comidas['porcentaje'])) {
              $comidas_config = new FoodTypeConfiguration();

              $comidas_config->id_configuracion_minuta    = $minuta_config->id;
              $comidas_config->id_tipo_comida             = $comidas['id_tipo_comida'];
              $comidas_config->cant_maxima                = $comidas['cant_maxima'];
              $comidas_config->porcentaje                 = $comidas['porcentaje'];
              $comidas_config->save();
            }
          }
        }
        return ['update' => true];
      }

    } catch (Exception $e) {
      \Log::info('Error creating user: ' . $e);
      return \Response::json(['created' => false], 500);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Minuta  $minuta
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    try {
      $configuraciones_minuta = MinutaConfiguration::where('id_minuta', $id)->get();
      foreach($configuraciones_minuta as $configuracion) {
        $configuracion_comidas = FoodTypeConfiguration::where('id_configuracion_minuta', $configuracion->id)->get();
        foreach($configuracion_comidas as $configuracion_comida) {
          FoodTypeConfiguration::destroy($configuracion_comida->id);
        }
        MinutaConfiguration::destroy($configuracion->id);
      }
      Minuta::destroy($id);
      return ['removed' => true];
    } catch (Exception $e) {
      $data = [
        'errors' => true,
        'msg' => $e->getMessage(),
      ];

      return \Response::json($data, 404);
    }
  }

  public function exportExcel($id_minuta) {

    $excel = Minuta::where('id', $id_minuta)->first();

    return Excel::download(new MinutaExport($id_minuta), $excel->nombre .'.xls');
  }
    
}
