<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Models\LenguageLevel;
use App\Models\OtherStudies;
use App\Models\Profile;
use App\Models\Rrss;
use App\Models\User;

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
        
      \DB::transaction(function() use ($request, $user_auth) {

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
        LenguageLevel::where('id_profile', $profile->id)->delete();
        foreach ($lenguages as $key => $lenguage) {
          $leguage_level = new LenguageLevel();
          $leguage_level->nivel_manejo  = $lenguage['nivel_manejo'];
          $leguage_level->id_lenguage   = $lenguage['id_lenguage'];
          $leguage_level->id_profile    = $profile->id;
          $leguage_level->save();
        }

        // RRSS
        $redes_sociales = $request->redes_sociales;
        Rrss::where('id_profile', $profile->id)->delete();
        foreach ($redes_sociales as $key => $red_social) {
          $rrss = new Rrss();
          $rrss->url          = $red_social['url'];
          $rrss->id_type_rrss = $red_social['id_type_rrss'];
          $rrss->id_profile   = $profile->id;
          $rrss->save();
        }

        // OTHER STUDIES
        $other_studies = $request->other_studies;
        OtherStudies::where('id_profile', $profile->id)->delete();
        foreach ($other_studies as $key => $studie) {
          $other_studie = new OtherStudies();
          $other_studie->nombre  = $studie['nombre'];
          $other_studie->lugar   = $studie['lugar'] ? $studie['lugar'] : '';
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
