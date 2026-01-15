<?php

namespace App\Http\Controllers;

use App\Models\Sword;
use App\Http\Requests\StoreSwordRequest;
use App\Http\Requests\UpdateSwordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SwordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $swords = Sword::all(); //all() funkció az ELOQUENT ORM funkciója
        //Eloquent ORM nélkül $swords = DB::table("swords")->get();

        //dd($kardok);  Debug módszer, return function.
        return view("swords.index", ["swords" => $swords]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->check()) {
            if (auth()->user()->cannot('create', Sword::class)) {
                abort(403);
            }
        } else {
            abort(403);
        }

        return view("swords.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSwordRequest $request)
    {

        $filename = "placeholder.png";
        //A kéréssel, megérkezett-e a feltölteni kívánt fájl:
        if ($request->hasFile("image") == true) {
            //Fájl lekérése változóba    
            $file = $request->file("image");
            //Egyedi név generálása - egyediazonosito.eredeti-kiterjesztés
            $filename = Str::uuid() . '.' . $file->extension();
            //Feltöltés
            $path = $file->storeAs('images/swords', $filename, 'public');
            //Ellenőrzés
            if (Storage::disk('public')->exists($path) == false) {
                return back()->withErrors(['image' => 'File could not be saved.']);
            }
        }

        //Mivel a kép nevét felül kell írni, ezért új objektumot csinálok, módosítom és mentem
        $sword = new Sword($request->all());
        $sword->image = $filename;
        $sword->save();

        //Egy soros megoldás, a bool típusú változót nem kell kezelni, ha nem jön át a  checkboxxal, mert az adatbázisban az alapértelmezett érték a False
        //Ha be van pipálva a checkbox az alap value=1 érték miatt, 1 lesz az értéke, ami jó az adatbázisba
        // Sword::create($request->all());

        //Átirányítás egy adott oldalra
        return redirect()->route("swords.index")->with("msg", "{$sword->name} was created successfully");

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
        return view("swords.show", ["sword" => $sword]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sword $sword)
    {
        return view("swords.edit", ["sword" => $sword]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSwordRequest $request, Sword $sword)
    {
        $sword->update($request->all());
        return redirect()->route("swords.index")->with("msg", "{$sword->name} was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sword $sword)
    {
        $sword->delete();
        return redirect()->route("swords.index")->with("msg", "{$sword->name} was deleted successfully");
    }

    /* Resource funkciók vége */

    /* Saját funkcionalitások */
    public function showTrashed()
    {
        $trashedSwords = Sword::onlyTrashed()->get(); //Csak a törölt kardok lekérése
        return view("swords.index", ["swords" => $trashedSwords]);
    }

    public function restore(Sword $sword)
    {
        $sword->restore();
        return redirect()->route('swords.index')->with('msg', "{$sword->name} was restored successfully");
    }
}
