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
        return view("swords.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSwordRequest $request)
    {
        //Egy soros megoldás, a bool típusú változót nem kell kezelni, ha nem jön át a  checkboxxal, mert az adatbázisban az alapértelmezett érték a False
        //Ha be van pipálva a checkbox az alap value=1 érték miatt, 1 lesz az értéke, ami jó az adatbázisba
        
        $sword = Sword::create($request->all());
        
        //Átirányítás egy adott oldalra
        return redirect()->route("swords.index")->with("msg", "Sword was created successfully");

        //Ha vissza akarsz menni arra az oldalra ahonnan jöttél
        //return back()->with("msg", "Sword was created successfully");


        //Te hozod kézzel létre a 
        /* $sword = new Sword($request->all());
        $sword->exclusive = 0;
        $sword->release = $request->released_at;
        $sword->save(); */
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
