<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;

class ApiAuthController extends Controller {

  public function userAuth(Request $request) {
    $userGoogle = \Socialite::with('google')->stateless()->userFromToken($request->access_token);
    $user = User::where('email', '=', $userGoogle->getEmail())->first();

    if(! $user){
      $user                  = new User;
      $user->nombre          = $userGoogle->getName();
      $user->email           = $userGoogle->getEmail();
      $user->avatar          = $userGoogle->getAvatar();
      $user->id_tipo_cuenta  = 1;
      $user->save();
    }

    try {
      // attempt to verify the credentials and create a token for the user with a week of validity
      if (! $token = JWTAuth::fromUser($user, ['exp' => Carbon::now()->addDays(7)->timestamp])) {
        return response()->json(['error' => 'invalid_credentials'], 403);
      }
    } catch (JWTException $e) {
      // something went wrong whilst attempting to encode the token
      return response()->json(['error' => 'could_not_create_token'], 500);
    }

    return response()->json([
      'token' => compact('token')['token'],
      'id'    => $user->id,  
      'email' => $user->email,
      'name'  => $user->nombre,
      'avatar'=> $user->avatar,
      'id_profile' => $user->id_profile
    ]);
  }
    
  public function getAuthenticatedUser() {
    try {
      if (! $user = JWTAuth::parseToken()->authenticate()) {
          return response()->json(['user_not_found'], 404);
      }
      if ($user->cuenta_activa === false) {
        // Cuenta desactivada
        return response()->json(['error' => 'Cuenta no activada'], 500);
      }
    } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {   
      return response()->json(['token_expired'], $e->getStatusCode());
    } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
      return response()->json(['token_invalid'], $e->getStatusCode());
    } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
      return response()->json(['token_absent'], $e->getStatusCode());
    }
    return response()->json(compact('user'));
  }

  public function getAuthUser()
  {
    try {
      if (! $user = JWTAuth::parseToken()->authenticate()) {
        return response()->json(['user_not_found'], 404);
      }
    } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
      return response()->json(['token_expired'], $e->getStatusCode());
    } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
      return response()->json(['token_invalid'], $e->getStatusCode());
    } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
      return response()->json(['token_absent'], $e->getStatusCode());
    }
    // the token is valid and we have found the user via the sub claim
    return $user;
  }
}
