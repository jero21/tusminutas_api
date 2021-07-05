<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AccountType;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){
    return User::with('minutas')->get();      
  }

  public function actualizarPerfil($id)
  {
    $perfil = AccountType::find($id);
    $perfil->nombre = "Básico";
    $perfil->save();

    $perf = new AccountType();
    $perf->nombre = "Profesional";
    $perf->save();

  }
}
