<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Models\LenguageLevel;
use App\Models\OtherStudies;
use App\Models\Profile;
use App\Models\Rrss;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created and uptate resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user_auth = JWTAuth::parseToken()->authenticate();
        
      DB::transaction(function() use ($request, $user_auth) {

        // Profile
        if ($request->id_profile) {
          $profile = Profile::find($request->id_profile);
        } else {
          $profile = new Profile();
        }
        $profile->profesion       = $request->profesion;
        $profile->presentacion    = $request->presentacion;
        $profile->ocupacion       = $request->ocupacion;
        $profile->especializacion = $request->especializacion;
        $profile->witio_web       = $request->sitio_web;
        $profile->telefono        = $request->telefono;
        $profile->save();

        // User
        $user = User::find($user_auth->id);
        $user->nombre = $request->nombre;
        $user->email = $request->email;
        if ($profile->id) {
          $user->id_profile = $profile->id;
        }
        $user->save();

        // LenguageLevel
        $lenguages = $request->lenguages_level;
        foreach ($lenguages as $key => $lenguage) {
          $leguage_level = LenguageLevel::find($lenguage->id)
          if (isset($leguage_level)) {
            $leguage_level = new LenguageLevel();
          }
          $leguage_level->nivel_manejo  = $request->nivel_manejo;
          $leguage_level->id_lenguage   = $request->id_lenguage;
          $leguage_level->id_profile    = $profile->id;
          $leguage_level->save();
        }

        // RRSS
        $redes_sociales = $request->redes_sociales;
        foreach ($redes_sociales as $key => $red_social) {
          $rrss = Rrss::find($red_social->id)
          if (isset($rrss)) {
            $rrss = new Rrss();
          }
          $rrss->url          = $red_social->url;
          $rrss->id_type_rrss = $red_social->id_type_rrss;
          $rrss->id_profile   = $profile->id;
          $rrss->save();
        }

        // OTHER STUDIES
        $other_studies = $request->other_studies;
        foreach ($other_studies as $key => $studie) {
          $other_studie = OtherStudies::find($studie->id)
          if (isset($other_studie)) {
            $other_studie = new OtherStudies();
          }
          $other_studie->nombre  = $studie->nombre;
          $other_studie->lugar   = $studie->lugar;
          $other_studie->id_profile      = $profile->id;
          $other_studie->save();
        }

      });
      return \Response::json(['create' => true], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Profile::with(
            [
                'nivelLenguaje.lenguaje', 
                'otherStudies', 
                'rrss.typesRrss'
            ]
        )->where('id', $id)->first();    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
