<?php

namespace App\Http\Controllers\Auth\Web;

use DB;
use Mail;
use Auth;
use Session;
use App\Models\User;
use App\Http\Controllers\WebController as BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\SignupRequest;

use App\Mail\UserSignup;

class SignupController extends BaseController
{
    public function displayForm()
    {
        return view('auth.signup');
    }

    public function signup(SignupRequest $request)
    {
        try {
            $user = new User;

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone_no = $request->phone_no;
            $user->role_id = getDefaultRole();
            $user->password = bcrypt($request->password);

            if ($user->save()) {
                $this->success(__('success.signup'));
                Mail::to(EMAIL_ERROR_REPORT)->send(new UserSignup($user));
                DB::commit();
                return redirect()->route('signin');
            }
        } catch (\Exception $ex) {
            DB::rollback();
            $this->errorEx($ex->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
