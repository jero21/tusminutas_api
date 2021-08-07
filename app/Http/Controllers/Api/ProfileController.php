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
        $profile->profesion         = $request->profesion;
        $profile->presentacion      = $request->presentacion;
        $profile->ocupacion         = $request->ocupacion;
        $profile->especializacion   = $request->especializacion;
        $profile->witio_web         = $request->sitio_web;
        $profile->telefono          = $request->telefono;
        $profile->email_profesional = $request->email_profesional;
        $profile->username          = $request->username;
        $profile->id_profile_status = 1;
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
        /*
        if ($request->hasfile('avatar')) {
          $file = $request->file('avatar');
          $filename = $file->getClientOriginalName();
          // $file->storeAs('avatars/', $user_auth->id, $filename, options: 's3');
          $user->update([
            'avatar' => $filename
          ]);
        }
        */
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

    // Publicar perfil sólo si el usuario tiene una cuenta premium
    public function publishProfile ($id_profile) {
      try {
        $user = JWTAuth::parseToken()->authenticate();
        if ($user->id_tipo_cuenta === 1) {
          return \Response::json([
            'published' => false,
            'errors' => "User has basic plan",
          ], 202);
        } else {
          $profile = Profile::find($request->id_profile);
          $profile->id_profile_status = 2;
          $profile->save();

          return \Response::json(['published' => true], 200);
        }
      } catch (Exception $e) {
        \Log::info('Error pusblish profile: ' . $e);
        return \Response::json(['published' => false], 500);
      }
    }

    public function unpublishProfile ($id_profile) {
      try {

        $profile = Profile::find($request->id_profile);
        $profile->id_profile_status = 1;
        $profile->save();

        return \Response::json(['unpublished' => true], 200);
      } catch (Exception $e) {
        \Log::info('Error unpublished profile: ' . $e);
        return \Response::json(['unpublished' => false], 500);
      }
    }

    public function showPerfil ($username) {

      $user = Profile::join('users', 'profile.id', '=', 'users.id_profile')
            ->select('users.id_tipo_cuenta', 'profile.id as id_profile')
            ->where('profile.username', $username)
            ->first();

      if ($user !== null && $user->id_tipo_cuenta === 2) {
          
          //query
          return Profile::with(
            [
                'nivelLenguaje.lenguaje', 
                'otherStudies', 
                'rrss.typesRrss'
            ]
        )->where('id', $user->id_profile)->first();

      } else {
        return \Response::json(['error' => true], 404);
      }
    }
}
