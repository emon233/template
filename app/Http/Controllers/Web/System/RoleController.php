<?php

namespace App\Http\Controllers\Web\System;

use DB;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\System\Role\StoreRequest;
use App\Http\Requests\System\Role\UpdateRequest;

class RoleController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('priority', 'desc')->get();

        return view('system.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $role = new Role;

            $role['title'] = $request->get('title');
            $role['priority'] = $request->get('priority');
            $role['all_access'] = $request->has('all_access') ? 1:0;
            $role['has_admin_access'] = $request->has('has_admin_access') ? 1:0;
            $role['is_default_role'] = $request->has('is_default_role') ? 1:0;

            if($role->save()) {
                $this->success(__('success.create'));
                DB::commit();
            }
        } catch (\Exception $ex) {
            DB::rollback();
            $this->errorEx($ex->getMessage());
            return redirect()->back();
        }

        return redirect()->route('system.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('system.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('system.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Role $role)
    {
        try {
            DB::beginTransaction();

            $data = $request->only('title', 'priority');
            $data['all_access'] = $request->has('all_access') ? 1:0;
            $data['has_admin_access'] = $request->has('has_admin_access') ? 1:0;
            $data['is_default_role'] = $request->has('is_default_role') ? 1:0;

            if(Role::find($role->id)->update($data)) {
                $this->success(__('success.update'));
                DB::commit();
            }
        } catch (\Exception $ex) {
            DB::rollback();
            $this->errorEx($ex->getMessage());
            return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        try {
            DB::beginTransaction();

            $role = Role::find($role->id);

            if(count($role->users)) {
                $this->error(__('error.roles.delete.users'));
                return redirect()->back();
            } else {
                if($role->delete()) {
                    $this->success(__('success.roles.delete'));
                    DB::commit();
                }
            }
        } catch(\Exception $ex) {
            DB::rollback();
            $this->errorEx($ex->getMessage());
            return redirect()->back();
        }

        return redirect()->route('system.roles.index');
    }
}
