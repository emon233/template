<?php

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
        MODEL_ROLE => __('Role')
    ];

    return is_null($input) ? $output : $output[$input];
}
