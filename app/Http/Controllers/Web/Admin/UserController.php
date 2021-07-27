<?php

namespace App\Http\Controllers\Web\Admin;

use DB;
use Session;
use App\Models\User;
use App\Http\Controllers\WebController as BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;


class UserController extends BaseController
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userPriority = auth()->user()->role->priority;

        $query = User::query();

        $query->with('role')->whereHas('role', function ($q) use ($userPriority) {
            $q->where('priority', '<=', $userPriority);
        });

        if ($request->has('keywords')) {
            $query->searchKeywords($request->keywords);
        }

        $users = $query->paginate(DEFAULT_PAGINATE)->withQueryString();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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

            $user = new User;

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->email_verified_at = now();
            $user->phone_no = $request->phone_no;
            $user->phone_no_verified_at = now();
            $user->role_id = $request->role_id;
            $user->password = bcrypt($request->password);

            if ($user->save()) {
                DB::commit();
                $this->success(__('success.create'));
                return redirect()->route('admin.users.show', $user);
            }
        } catch (\Exception $ex) {
            DB::rollback();
            $this->errorEx($ex->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        try {
            DB::beginTransaction();

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone_no = $request->phone_no;
            $user->role_id = $request->role_id;

            if ($request->password) $user->password = bcrypt($request->password);

            if ($user->save()) {
                DB::commit();
                $this->success(__('success.update'));
                return redirect()->route('admin.users.show', $user);
            }
        } catch (\Exception $ex) {
            DB::rollback();
            $this->errorEx($ex->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Verify User Email Manually
     *
     * @param User $user
     * @return void
     */
    public function verify_email(User $user)
    {
        try {
            DB::beginTransaction();

            $user->email_verified_at = now();

            if ($user->save()) {
                DB::commit();
                $this->success(__('success.verify.email'));
                return redirect()->route('admin.users.show', $user);
            }
        } catch (\Exception $ex) {
            DB::rollback();
            $this->errorEx($ex->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Verify Phone No Manually
     *
     * @param User $user
     * @return void
     */
    public function verify_phone_no(User $user)
    {
        try {
            DB::beginTransaction();

            $user->phone_no_verified_at = now();

            if ($user->save()) {
                DB::commit();
                $this->success(__('success.verify.phone_no'));
                return redirect()->route('admin.users.show', $user);
            }
        } catch (\Exception $ex) {
            DB::rollback();
            $this->errorEx($ex->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
