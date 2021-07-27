<?php

namespace App\Http\Controllers\Web\System;

use DB;
use App\Models\Access;
use App\Http\Controllers\WebController as BaseController;
use Illuminate\Http\Request;

class AccessController extends BaseController
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Access::class, 'access');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accesses = Access::orderBy('model_name', 'asc')->paginate(DEFAULT_PAGINATE);

        return view('system.access.index', compact('accesses'));
    }

    /**
     * Automatic Update of Access Methods
     *
     * @return void
     */
    public function auto()
    {
        DB::beginTransaction();
        $methods = all_methods();
        $models = all_models();

        try {
            $accessCount = 0;
            $trueCount = 0;
            foreach ($models as $model) {
                foreach ($methods as $method) {
                    $accessCount++;
                    $checked = $this->check($model, $method);

                    if (!$checked) {
                        $access = new Access;

                        $access->model_name = $model;
                        $access->method_name = $method;

                        if ($access->save()) {
                            $trueCount++;
                        }
                    } else {
                        $trueCount++;
                    }
                }
            }

            if ($accessCount == $trueCount) {
                $this->success(__('success.create'));
                DB::commit();
                return redirect()->route('system.accesses.index');
            }
        } catch (\Exception $ex) {
            DB::rollback();
            $this->errorEx($ex->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Check if Model-Method Combo Enlisted in DB
     *
     * @param [type] $model
     * @param [type] $method
     * @return void
     */
    protected function check($model, $method)
    {
        $check = Access::where([
            ['model_name', '=', $model],
            ['method_name', '=', $method]
        ])->first();

        return $check ? true : false;
    }
}
