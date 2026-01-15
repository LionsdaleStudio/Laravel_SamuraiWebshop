<?php

namespace App\Models;

use App\Observers\SwordObserver;
use App\Policies\SwordPolicy;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy(SwordObserver::class)]
#[UsePolicy(SwordPolicy::class)] //nem kötelező, manuális regisztráció, a laravel magától felismeri az aktív policyket ha jók az elnevezések
class Sword extends Model
{
    /** @use HasFactory<\Database\Factories\SwordFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "name",
        "length",
        "price",
        "description",
        "release",
        "exclusive",
        "image"
    ];

    /* RELATIONS */
    public function samurai() { //Keresi a samurai.id-t a Samurai táblában. ami ugyanaz mint a swords.samurai_id
        return $this->belongsTo(Samurai::class);
    }
}
