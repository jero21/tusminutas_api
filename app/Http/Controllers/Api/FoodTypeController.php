<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FoodType;
use Illuminate\Http\Request;

class FoodTypeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return FoodType::all();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    if (!is_array($request->all())) {
      return ['error' => 'request must be an array'];
    }
    
    $rules = ['nombre' => 'required'];

    try {
      $validator = \Validator::make($request->all(), $rules);
      if ($validator->fails()) {
        return [
          'created' => false,
          'errors' => $validator->errors()->all(),
        ];
      } else {
        FoodType::create($request->all());
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
   * @param  \App\Models\FoodType  $foodType
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    try {
      return FoodType::all()->where('id', $id)->first();
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
   * @param  \App\Models\FoodType  $foodType
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {

    if (!is_array($request->all())) {
      return ['error' => 'request must be an array'];
    }

    $rules = ['nombre' => 'required'];

    try {
      $validator = \Validator::make($request->all(), $rules);
      if ($validator->fails()) {
        return [
          'created' => false,
          'errors' => $validator->errors()->all(),
        ];
      } else {
        $evento = FoodType::findOrFail($id);
        $evento->update($request->all());
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
   * @param  \App\Models\FoodType  $foodType
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    try {
      FoodType::destroy($id);
      return ['removed' => true];
    } catch (Exception $e) {
      $data = [
        'errors' => true,
        'msg' => $e->getMessage(),
      ];
      return \Response::json($data, 404);
    }
  }
}
