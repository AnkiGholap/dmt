<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Skuforcastt3;
use App\Models\User;

class Skuforcastt3Policy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
        return $user->hasPermissionTo('skuforcastt3-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Skuforcastt3  $skuforcastt3
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Skuforcastt3 $skuforcastt3)
    {
        //
        return $user->hasPermissionTo('skuforcastt3-view');

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
        return $user->hasPermissionTo('skuforcastt3-create');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Skuforcastt3  $skuforcastt3
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Skuforcastt3 $skuforcastt3)
    {
        //
        return $user->hasPermissionTo('skuforcastt3-update');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Skuforcastt3  $skuforcastt3
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Skuforcastt3 $skuforcastt3)
    {
        //
        return $user->hasPermissionTo('skuforcastt3-delete');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Skuforcastt3  $skuforcastt3
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Skuforcastt3 $skuforcastt3)
    {
        //
        return $user->hasPermissionTo('skuforcastt3-restore');

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Skuforcastt3  $skuforcastt3
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Skuforcastt3 $skuforcastt3)
    {
        //
        return $user->hasPermissionTo('skuforcastt3-forceDelete');

    }
}
