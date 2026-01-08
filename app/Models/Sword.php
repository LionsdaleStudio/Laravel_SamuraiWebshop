<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sword extends Model
{
    /** @use HasFactory<\Database\Factories\SwordFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "length",
        "price",
        "description",
        "release",
        "exclusive",
    ];
}
