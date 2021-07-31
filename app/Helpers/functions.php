<?php

use App\Models\Role;

/**
 * Undocumented function
 *
 * @param [type] $string
 * @return void
 */
function generateBangladeshiNumber($string)
{
    return '+8801' . substr($string, -9);
}


/**
 * Check if Auth::user() is System Admin
 *
 * @return boolean
 */
function isSystemAdmin()
{
    if (auth()->check()) {
        return auth()->user()->role->priority == 100 ? true : false;
    }

    return false;
}

/**
 * Get Roles for authenticated user
 *
 * @return void
 */
function getRolesOnUser()
{
    $userPriority = auth()->user()->role->priority;

    return Role::where('priority', '<=', $userPriority)->orderBy('priority', 'desc')->get();
}

function modifyColumnName($string)
{
    return strtoupper(str_replace('_', ' ', $string));
}
