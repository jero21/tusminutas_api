<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Minuta;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function index() {
        return Food::all()->toJson(JSON_NUMERIC_CHECK);
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
                Food::create($request->all());
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        try {
            return Food::all()->where('id', $id)->first()->toJson(JSON_NUMERIC_CHECK);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

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
                $food = Food::findOrFail($id);
                $food->update($request->all());
                return ['update' => true];
            }
        } catch (Exception $e) {
            $data = [
                'errors' => true,
                'msg' => $e->getMessage(),
            ];
            return \Response::json($data, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            Food::destroy($id);
            return ['removed' => true];
        } catch (Exception $e) {
            $data = [
                'errors' => true,
                'msg' => $e->getMessage(),
            ];

            return \Response::json($data, 404);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function eliminarAlimentosRepetidos () {
        $minutas = Minuta::all();
        $array = [];
        foreach ($minutas as $key => $minuta) {
            $comidas = $minuta->comidas;
            foreach (json_decode($comidas) as $key => $comida) {
                $foods = json_encode($comida->foods);
                foreach (json_decode($foods) as $key => $food) {
                    $id_food = json_encode($food->id);
                    array_push($array, $id_food);
                }
            }
        }
        Food::where('id', '>', '1147')->whereNotIn('id', $array)->delete();
    }
}
