<?php

namespace App\Policies;

use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderItemPolicy
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
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, OrderItem $orderItem)
    {
        //
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
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, OrderItem $orderItem)
    {
        // Add your custom logic for checking if the user has permission to update
        return $user->role === 'admin'; // For example, only admins can update
    }

    public function delete(User $user, OrderItem $orderItem)
    {
        // Add your custom logic for checking if the user has permission to delete
        return $user->role === 'admin'; // For example, only admins can delete
    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, OrderItem $orderItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, OrderItem $orderItem)
    {
        //
    }
}
