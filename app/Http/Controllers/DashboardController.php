<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Minuta;
use App\Models\NutritionistFood;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* **********USUARIOS**************** */

        $users = User::all();
        $count_users = $users->count();

        $users_basic = User::where('id_profile', 1)->get();
        $count_users_basic = $users_basic->count();

        $users_profetional = User::where('id_profile', 2)->get();
        $count_users_profetional = $users_profetional->count();

        /* **********MINUTAS**************** */

        $minutes = Minuta::all();
        $count_minutes = $minutes->count();

        $shared_minutes = Minuta::join('client_minuta', 'minutas.id_minuta_cliente', '=', 'client_minuta.id')->get();
        $count_shared_minutes = $shared_minutes->count();

        /* **********ALIMENTOS**************** */

        $foods = NutritionistFood::all();
        $count_foods = $foods->count();

        return Inertia::render('Dashboard', [
            'count_users' => $count_users,
            'count_users_basic' => $count_users_basic,
            'count_users_profetional' => $count_users_profetional,
            'count_minutes' => $count_minutes,
            'count_shared_minutes' => $count_shared_minutes,
            'count_foods' => $count_foods,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
}
