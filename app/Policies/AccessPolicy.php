<?php

namespace App\Policies;

use App\Models\Access;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccessPolicy
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
        return hasAccess('App\Models\Access', 'viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Access $access)
    {
        return hasAccess('App\Models\Access', 'view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return hasAccess('App\Models\Access', 'create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Access $access)
    {
        return hasAccess('App\Models\Access', 'update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Access $access)
    {
        return hasAccess('App\Models\Access', 'delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Access $access)
    {
        return hasAccess('App\Models\Access', 'restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Access $access)
    {
        return hasAccess('App\Models\Access', 'forceDelete');
    }
}
