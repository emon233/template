<?php

use App\Models\Role;
use App\Models\Access;
use App\Models\AccessRole;

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

    if($role->all_access) {
        return true;
    } else {
        $access = Access::where([
            ['model_name', $model], ['method_name', $method]
        ])->first();

        if($access) {
            $access_role = AccessRole::where([
                ['access_id', '=', $access->id], ['role_id', $role->id]
            ])->first();

            return $access_role ? true : false;
        } else {
            return false;
        }
    }
}

/**
 * Check Access Permission for Assignment
 *
 * @param [type] $model
 * @param [type] $method
 * @param [type] $role
 * @return boolean
 */
function hasAccessAssign($model, $method, $role)
{
    if($role->all_access) {
        return true;
    } else {
        $access = Access::where([
            ['model_name', $model], ['method_name', $method]
        ])->first();

        if($access) {
            $access_role = AccessRole::where([
                ['access_id', '=', $access->id], ['role_id', $role->id]
            ])->first();

            return $access_role ? true : false;
        } else {
            return false;
        }
    }
}

/**
 * Check All Access Permission for Role
 *
 * @param [type] $model
 * @param [type] $role
 * @return boolean
 */
function hasAllAccessAssign($model, $role)
{
    if($role->all_access) return true;
    else {
        $accesses = Access::where([
            ['model_name', $model]
        ])->get();

        $accessCount = count($accesses);
        $counter = 0;

        foreach(all_methods() as $method) {
            $access = Access::where([
                ['model_name', $model], ['method_name', $method]
            ])->first();

            if($access) {
                $check = AccessRole::where([
                    ['access_id', $access->id], ['role_id', $role->id]
                ])->first();

                if($check) $counter++;
            }
        }

        return $accessCount == $counter ? true : false;
    }
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
const MODEL_ACCESS_ROLE = "AccessRole";

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
        MODEL_ACCESS => __('Access'),
        MODEL_ACCESS_ROLE => __('AccessRole'),
    ];

    ksort($output);
    return is_null($input) ? $output : $output[$input];
}
