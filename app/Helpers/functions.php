<?php

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
    if(auth()->check()) {
        return auth()->user()->role->priority == 100 ? true : false;
    }

    return false;
}
