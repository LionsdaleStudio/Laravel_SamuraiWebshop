<?php

namespace App\Policies;

use App\Models\Sword;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SwordPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; //Láthatja bárki
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Sword $sword): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //Csak az admin hozhat létre
        if (auth()->user()->role->slug == "admin") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Sword $sword): bool
    {
        //Csak az admin frissíthet
        if (auth()->user()->role->slug == "admin") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Sword $sword): bool
    {
        //Csak az admin törölhet
        if (auth()->user()->role->slug == "admin") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Sword $sword): bool
    {
        //Csak az admin állíthat vissza
        if (auth()->user()->role->slug == "admin") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Sword $sword): bool
    {
        //Csak az admin törölhet
        if (auth()->user()->role->slug == "admin") {
            return true;
        } else {
            return false;
        }
    }

    public function before(User $user)
    {
        //Először leellenőrzöm minden funkció előtt, hogy admin vagyok-e, ha igen mehet.
        //Ha nem, akkor utána ellenőrzöm a többi lehetséges funkcionalitást.
        if ($user->role->slug == "admin") {
            return true;
        }
        return null;
    }
    //A before funkciónak vagy bool-t vagy null-t kell átadnia. A null esetében ellenőrzi a többi funkciót

}
