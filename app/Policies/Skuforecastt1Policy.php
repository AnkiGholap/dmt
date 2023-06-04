<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Skuforecastt1;
use App\Models\User;

class Skuforecastt1Policy
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
        return $user->hasPermissionTo('skuforecastt1-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Skuforecastt1  $skuforecastt1
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Skuforecastt1 $skuforecastt1)
    {
        //
        return $user->hasPermissionTo('skuforecastt1-view');

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
        return $user->hasPermissionTo('skuforecastt1-create');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Skuforecastt1  $skuforecastt1
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Skuforecastt1 $skuforecastt1)
    {
        //
        return $user->hasPermissionTo('skuforecastt1-update');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Skuforecastt1  $skuforecastt1
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Skuforecastt1 $skuforecastt1)
    {
        //
        return $user->hasPermissionTo('skuforecastt1-delete');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Skuforecastt1  $skuforecastt1
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Skuforecastt1 $skuforecastt1)
    {
        //
        return $user->hasPermissionTo('skuforecastt1-restore');

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Skuforecastt1  $skuforecastt1
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Skuforecastt1 $skuforecastt1)
    {
        //
        return $user->hasPermissionTo('skuforecastt1-forceDelete');

    }
}
