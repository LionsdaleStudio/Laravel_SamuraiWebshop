<?php

namespace App\Observers;

use App\Models\Sword;

class SwordObserver
{
    /**
     * Handle the Sword "created" event.
     */
    public function creating(Sword $sword): void
    {
        $sword->created_by = auth()->user()->id;
        //$sword->save(); // Valójában ezen a ponton a feltöltött kard frissítését hajta végre, így lefut az update paransc is ennek kivédése szintén az ing formátummal és a save elvetésével lehet
    }

    /**
     * Handle the Sword "updated" event.
     */
    public function updating(Sword $sword): void
    {
        $sword->updated_by = auth()->user()->id;
        //A múlt idejű forma nem jó, mert ráfrissít a frissítésre és végtelen ciklusba kerülünk
        //Nem kell update parancs, mivel még a frissítés előtt átírja az updated_by oszlop értékét
    }

    /**
     * Handle the Sword "deleted" event.
     */
    public function deleted(Sword $sword): void
    {
        //
    }

    /**
     * Handle the Sword "restored" event.
     */
    public function restored(Sword $sword): void
    {
        //
    }

    /**
     * Handle the Sword "force deleted" event.
     */
    public function forceDeleted(Sword $sword): void
    {
        //
    }
}
