<?php

use App\Models\Role;
use App\Models\Access;

/**
 * Check Access Permission
 *
 * @return boolean
 */
function hasAccess($model, $method)
{
    $model = str_replace("App\Models\\", "", $model);
    $access = Access::where('model_name', $model)->first();

    if(!auth()->check()) return false;
    $role = auth()->user()->role;

    if($role->all_access) return true;
    else return false;
}

/**
 * Methods Listing
 */

const METHOD_VIEWANY = "viewAny";
const METHOD_VIEW = "view";
const METHOD_CREATE = "create";
const METHOD_UPDATE = "update";
const METHOD_DELETE = "delete";
const METHOD_RESTORE = "restore";
const METHOD_FORCEDELETE = "forceDelete";


/**
 * Get All Listed Authorization Methods
 *
 * @param [type] $input
 * @return array|string
 */
function all_methods($input = null)
{
    $output = [
        METHOD_VIEWANY => __('viewAny'),
        METHOD_VIEW => __('view'),
        METHOD_CREATE => __('create'),
        METHOD_UPDATE => __('update'),
        METHOD_DELETE => __('delete'),
        METHOD_RESTORE => __('restore'),
        METHOD_FORCEDELETE => __('forceDelete'),
    ];

    return is_null($input) ? $output : $output[$input];
}

/**
 * Models Listing
 */

const MODEL_USER = "User";
const MODEL_ROLE = "Role";
const MODEL_ACCESS = "Access";

/**
 * Get All Listed Models
 *
 * @param [type] $input
 * @return array|string
 */
function all_models($input = null)
{
    $output = [
        MODEL_USER => __('User'),
        MODEL_ROLE => __('Role'),
        MODEL_ACCESS => __('Access')
    ];

    return is_null($input) ? $output : $output[$input];
}
