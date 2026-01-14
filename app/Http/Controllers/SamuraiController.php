<?php

namespace App\Http\Controllers;

use App\Models\Samurai;
use App\Http\Requests\StoreSamuraiRequest;
use App\Http\Requests\UpdateSamuraiRequest;
use App\Models\User;

class SamuraiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $samurai = Samurai::find(1); //1 id-jű szamuráj lekérése és userei kiiratása pivot alapján
        dd($samurai->users);

        /*  $user = User::find(2);  //2 id-jű user lekérése és kedvenc szamurájainak kiiratása pivot alapján
         dd($user->samurais); */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSamuraiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Samurai $samurai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Samurai $samurai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSamuraiRequest $request, Samurai $samurai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Samurai $samurai)
    {
        //
    }
}
