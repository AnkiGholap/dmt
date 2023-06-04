<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Actualstock;
use App\Models\User;

class ActualstockPolicy
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
        return $user->hasPermissionTo('actualstock-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Actualstock  $actualstock
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Actualstock $actualstock)
    {
        //
        return $user->hasPermissionTo('actualstock-view');

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
        return $user->hasPermissionTo('actualstock-create');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Actualstock  $actualstock
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Actualstock $actualstock)
    {
        //
        return $user->hasPermissionTo('actualstock-update');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Actualstock  $actualstock
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Actualstock $actualstock)
    {
        //
        return $user->hasPermissionTo('actualstock-delete');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Actualstock  $actualstock
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Actualstock $actualstock)
    {
        //
        return $user->hasPermissionTo('actualstock-restore');

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Actualstock  $actualstock
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Actualstock $actualstock)
    {
        //
        return $user->hasPermissionTo('actualstock-forceDelete');

    }
}
