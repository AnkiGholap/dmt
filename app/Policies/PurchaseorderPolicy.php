<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Purchaseorder;
use App\Models\User;

class PurchaseorderPolicy
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
        return $user->hasPermissionTo('purchaseorder-viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Purchaseorder  $purchaseorder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Purchaseorder $purchaseorder)
    {
        //
        return $user->hasPermissionTo('purchaseorder-view');

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
        return $user->hasPermissionTo('purchaseorder-create');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Purchaseorder  $purchaseorder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Purchaseorder $purchaseorder)
    {
        //
        return $user->hasPermissionTo('purchaseorder-update');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Purchaseorder  $purchaseorder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Purchaseorder $purchaseorder)
    {
        //
        return $user->hasPermissionTo('purchaseorder-delete');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Purchaseorder  $purchaseorder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Purchaseorder $purchaseorder)
    {
        //
        return $user->hasPermissionTo('purchaseorder-restore');

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Purchaseorder  $purchaseorder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Purchaseorder $purchaseorder)
    {
        //
        return $user->hasPermissionTo('purchaseorder-forceDelete');

    }
}
