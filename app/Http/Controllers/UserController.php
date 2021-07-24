<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->select('users.nombre', 'users.email', 'account_type.nombre as cuenta', DB::raw('count(minutas.id) as minutas'))
            ->join('account_type', 'users.id_tipo_cuenta', '=', 'account_type.id')
            ->leftJoin('minutas', 'users.id', '=', 'minutas.id_user')
            ->groupBy('users.id', 'users.nombre', 'users.email', 'account_type.nombre')
            ->orderBy('minutas', 'desc')
            ->distinct()
            ->get();

        return Inertia::render('User/Users', ['users' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function usersByAccountType(Request $request)
    {
        $users = DB::table('users')
            ->select('users.nombre', 'users.email', 'account_type.nombre as cuenta', DB::raw('count(minutas.id) as minutas'))
            ->join('account_type', 'users.id_tipo_cuenta', '=', 'account_type.id')
            ->leftJoin('minutas', 'users.id', '=', 'minutas.id_user')
            ->where('users.id_tipo_cuenta', $request->account_type)
            ->groupBy('users.id', 'users.nombre', 'users.email', 'account_type.nombre')
            ->orderBy('minutas', 'desc')
            ->distinct()
            ->get();

        return Inertia::render('User/Users', ['users' => $users]);

    }

}
