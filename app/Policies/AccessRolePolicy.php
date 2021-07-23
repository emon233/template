<?php

namespace App\Policies;

use App\Models\AccessRole;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccessRolePolicy
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
        return hasAccess('App\Models\AccessRole', 'viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AccessRole  $accessRole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AccessRole $accessRole)
    {
        return hasAccess('App\Models\AccessRole', 'view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return hasAccess('App\Models\AccessRole', 'create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AccessRole  $accessRole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AccessRole $accessRole)
    {
        return hasAccess('App\Models\AccessRole', 'update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AccessRole  $accessRole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AccessRole $accessRole)
    {
        return hasAccess('App\Models\AccessRole', 'delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AccessRole  $accessRole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AccessRole $accessRole)
    {
        return hasAccess('App\Models\AccessRole', 'restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AccessRole  $accessRole
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AccessRole $accessRole)
    {
        return hasAccess('App\Models\AccessRole', 'forceDelete');
    }
}
