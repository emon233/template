<?php

namespace App\Http\Controllers\Web\System;

use DB;
use Session;
use App\Models\Access;
use App\Models\AccessRole;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccessRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        return view('system.role.access', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $role)
    {
        $accessArray = [];
        if($request->has('method')) {
            $methodArray = $request->get('method');
            foreach($methodArray as $key=>$method) {
                $split = explode("-",$key);
                $model = $split[0];
                $method = $split[1];

                $check = $this->does_model_method_exist($model, $method);

                if($check) {
                    $accessArray[] = $check;
                }
            }
        }

        try {
            DB::beginTransaction();
            $status = $this->sync_data($role->id, $accessArray);

            if($status) {
                $this->success(__('success.roles.access.assign'));
                DB::commit();
            } else {
                $this->error(__('error.roles.access.assign'));
                DB::rollback();
            }
        } catch(\Exception $ex) {
            DB::rollback();
            $this->errorEx($ex->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Check if Model-Method Combo exists in db
     *
     * @return bool|object
     */
    protected function does_model_method_exist($model, $method)
    {
        $access = Access::where([
            ['model_name', '=', $model],
            ['method_name', '=', $method]
        ])->first();

        return $access ? $access->id : false;
    }

    /**
     * Remove All Acces for Role
     *
     * @param [type] $role_id
     * @return void
     */
    protected function sync_data($role_id, $accesses)
    {
        $status = true;

        try {
            $access_roles = AccessRole::withTrashed()->where('role_id', $role_id)->get();

            foreach($access_roles as $accessRole) {
                AccessRole::withTrashed()->find($accessRole->id)->forceDelete();
            }

            foreach($accesses as $access) {
                $exist = AccessRole::where([
                    ['role_id', $role_id], ['access_id', $access]
                ])->first();

                if(!$exist) {
                    AccessRole::create([
                        'role_id' => $role_id,
                        'access_id' => $access
                    ]);
                }
            }
        } catch(\Exception $ex) {
            $status = false;
            $this->errorEx($ex->getMessage());
        }

        return $status;
    }
}
