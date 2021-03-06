<?php

namespace App\Http\Controllers\Web;

use DB;
use Session;
use App\Models\User;
use App\Http\Controllers\WebController as BaseController;
use Illuminate\Http\Request;

use App\Http\Requests\Profile\UpdateRequest;
use App\Http\Requests\Profile\UpdateEmailRequest;
use App\Http\Requests\Profile\UpdatePhoneNoRequest;
use App\Http\Requests\Profile\UpdatePasswordRequest;

class ProfileController extends BaseController
{
    /**
     * Display Profile Page
     *
     * @return void
     */
    public function index()
    {
        if (auth()->user()->role->has_admin_access) {
            return view('admin.profile.index');
        }

        return redirect()->route('welcome');
    }

    /**
     * Update Current User's Profile
     *
     * @param Request $request
     * @return void
     */
    public function update(UpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('first_name', 'last_name');
            $update = User::find(auth()->user()->id)->update($data);

            if ($update) {
                $this->success(__('success.update.profile'));
                DB::commit();
            } else {
                $this->error(__('error.update.profile'));
                DB::rollback();
            }
        } catch (\Exception $ex) {
            DB::rollback();
            $this->errorEx($ex->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Update Current User's Email Address
     *
     * @param Request $request
     * @return void
     */
    public function updateEmail(UpdateEmailRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('email');
            $user = User::find(auth()->user()->id);

            if ($data['email'] != $user->email) {
                $data['email_verified_at'] = null;
                $update = User::find(auth()->user()->id)->update($data);

                if ($update) {
                    $this->success(__('success.update.email'));
                    DB::commit();
                } else {
                    $this->error(__('error.update.email'));
                    DB::rollback();
                }
            } else {
                $this->success(__('success.update.email'));
                DB::commit();
            }
        } catch (\Exception $ex) {
            DB::rollback();
            $this->errorEx($ex->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Update Current User's Phone No
     *
     * @param Request $request
     * @return void
     */
    public function updatePhone(UpdatePhoneNoRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('phone_no');
            $user = User::find(auth()->user()->id);

            if ($data['phone_no'] != $user->phone_no) {
                $data['phone_no_verified_at'] = null;
                $update = User::find(auth()->user()->id)->update($data);

                if ($update) {
                    $this->success(__('success.update.phone'));
                    DB::commit();
                } else {
                    $this->error(__('error.update.phone'));
                    DB::rollback();
                }
            } else {
                $this->success(__('success.update.phone'));
                DB::commit();
            }
        } catch (\Exception $ex) {
            DB::rollback();
            $this->errorEx($ex->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Update Current User's Password
     *
     * @param Request $request
     * @return void
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('password');
            $data['password'] = bcrypt($data['password']);
            $update = User::find(auth()->user()->id)->update($data);

            if ($update) {
                $this->success(__('success.update.password'));
                DB::commit();
            } else {
                $this->error(__('error.update.password'));
                DB::rollback();
            }
        } catch (\Exception $ex) {
            DB::rollback();
            $this->errorEx($ex->getMessage());
        }

        return redirect()->back();
    }
}
