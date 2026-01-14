<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Samurai extends Model
{
    /** @use HasFactory<\Database\Factories\SamuraiFactory> */
    use HasFactory;

    /* Relations */

    public function sword()
    { //sword_id-t keresi a Swords táblában, ami ugyanaz mint a saját Samurai ID
        return $this->hasOne(Sword::class); //hasOne -- megtalálja az első kardot és visszadja
    }


    public function swords()
    { //sword_id-t keresi a Swords táblában, ami ugyanaz mint a saját Samurai ID
        return $this->hasMany(Sword::class); //hasOne -- megtalálja az összes kardot és visszadja tömbben
    }

    public function users() { //PIVOT táblában keresi az összes samurai_id (ami a saját ID-je) és a mellé tartozó összes user_id-t, ami alapján lekéri a User modellt. 
        return $this->belongsToMany(User::class);
    }
}
