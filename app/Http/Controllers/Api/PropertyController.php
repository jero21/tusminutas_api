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
}
