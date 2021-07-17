<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AccountType;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return AccountType::with('users')->get();
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
   * @param  \App\Models\v  $accountType
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    try {
      return AccountType::with('users')->where('id', $id)->first();
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
   * @param  \App\Models\AccountType  $accountType
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, AccountType $accountType)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\AccountType  $accountType
   * @return \Illuminate\Http\Response
   */
  public function destroy(AccountType $accountType)
  {
      //
  }
}
