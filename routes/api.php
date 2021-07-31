<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\NutritionistFoodController;
use App\Http\Controllers\Api\MinutaController;
use App\Http\Controllers\Api\AccountTypeController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\TypeRrssController;
use App\Http\Controllers\Api\LenguageController;
use App\Http\Controllers\Api\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['jwt.auth']], function () {

	Route::get('me', [ApiAuthController::class, 'getAuthenticatedUser']);

	Route::apiResource('alimentos', FoodController::class);
	Route::apiResource('alimentos_nutricionistas', NutritionistFoodController::class);
	Route::apiResource('minutas', MinutaController::class);
	Route::apiResource('tipoCuentas', AccountTypeController::class);
	Route::apiResource('nutricionistas', UserController::class);
	Route::apiResource('propiedad', PropertyController::class);
	Route::apiResource('profile', ProfileController::class);
	Route::apiResource('type_rrss', TypeRrssController::class);
	Route::apiResource('lenguage', LenguageController::class);

	Route::post('minuta_cliente', [MinutaController::class, 'minutaCliente']);
	Route::post('update_config', [MinutaController::class, 'updateConfig']);

});

// login
Route::post('auth_login', [ApiAuthController::class, 'userAuth']);
// Excel Export
Route::get('excel/{id_minuta}', [MinutaController::class, 'exportExcel']);
// Minuta Cliente
Route::get('index_minuta_cliente/{uuid}', [MinutaController::class, 'indexCliente']);
Route::get('show_minuta_cliente/{uuid}', [MinutaController::class, 'showCliente']);
Route::get('propiedad', [PropertyController::class, 'indexCliente']);
