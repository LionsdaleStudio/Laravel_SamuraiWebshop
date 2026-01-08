<?php

namespace App\Http\Controllers;

use App\Models\Sword;
use App\Http\Requests\StoreSwordRequest;
use App\Http\Requests\UpdateSwordRequest;

class SwordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $swords = Sword::all();
        //dd($kardok);  Debug módszer, return function.
        return view("swords.index", ["swords" => $swords]);
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
    public function store(StoreSwordRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sword $sword)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sword $sword)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSwordRequest $request, Sword $sword)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sword $sword)
    {
        //
    }
}
