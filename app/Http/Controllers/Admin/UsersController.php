<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateUser;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Lang;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('can:manageUsers,App\Models\User');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create')->with([
            'user' => new User,
        ])->with('status', Lang::get('admin.status_message_success'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Auth::user()->save(new User($request->only(
            [
                'username',
                'email',
                'roles',
                'password',
            ]
        )));

        return redirect()->route('users.index')->with('status', Lang::get('admin.store_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view(
            'admin.users.edit',
            [
                'user' => $user,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateUser $request, User $user)
    {
        if (Auth::user()->cant('manageUsers', $user)) {
            return redirect()->route('users.index')->with('status', Lang::get('admin.status_message_denied', ['1' => 'manage', '2' => 'users']));
        }

        $msg = [];
        $roles = $request->roles;

        if (Auth::user()->hasRole('admin') && Auth::user()->id == $user->id && ! in_array('1', $roles)) {
            $roles[] = '1';
            $msg[] = Lang::get('admin.users_status_message_denied_selfadmin');
        }

        // update user model
        $user->fill($request->only([
            'username',
            'email',
        ]));

        // update password
        if (
            ! empty($request->password) && ! empty($request->password_confirm)
            && $request->password == $request->password_confirm
            && strlen($request->password) >= 6
        ) {
            $user->password = Hash::make($request->password);
        }

        $user->profile()->first()->fill($request->only(
            [
                'user_id',
                'forename',
                'surname',
                'avatar',
                'phone',
                'position',
                'biography',
                'links',
                'picture',
            ]
        ))->update();

        $user->save();

        // update roles model
        $user->roles()->sync($roles);

        $msg = implode('<br><br>', $msg);

        return redirect()->route('users.index')->with('status', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        if (Auth::user()->cant('manageUsers', $user)) {
            return redirect()->route('users.index')->with('status', Lang::get('admin.status_message_denied', ['1' => 'delete', '2' => 'users']));
        }

        UserProfile::where('user_id', $user->id)->delete();

        $user->delete();

        return redirect()->route('users.index')->with('status', Lang::get('admin.status_message_success', ['1' => 'user', '2' => 'deleted']));
    }
}
