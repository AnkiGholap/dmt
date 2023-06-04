<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Salesdata;
use App\Models\User;

class SalesdataPolicy
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
        return $user->hasPermissionTo('salesdata-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Salesdata  $salesdata
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Salesdata $salesdata)
    {
        //
        return $user->hasPermissionTo('salesdata-view');

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
        return $user->hasPermissionTo('salesdata-create');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Salesdata  $salesdata
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Salesdata $salesdata)
    {
        //
        return $user->hasPermissionTo('salesdata-update');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Salesdata  $salesdata
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Salesdata $salesdata)
    {
        //
        return $user->hasPermissionTo('salesdata-delete');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Salesdata  $salesdata
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Salesdata $salesdata)
    {
        //
        return $user->hasPermissionTo('salesdata-restore');

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Salesdata  $salesdata
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Salesdata $salesdata)
    {
        //
        return $user->hasPermissionTo('salesdata-forceDelete');

    }
}
