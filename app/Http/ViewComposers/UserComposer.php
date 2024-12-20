<?php

namespace App\Http\ViewComposers;

use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;

class UserComposer
{
    /**
     * Create a movie composer.
     *
     * @return void
     */
    protected $users;

    protected $roles;

    public function __construct()
    {

        $this->users = User::with(['profile', 'roles'])->get();
        $this->roles = Role::all();
    }

    /**
     * Bind data to the view.
     *
     * @return void
     */
    public function compose(View $view)
    {

        $view->with(['users' => $this->users, 'roles' => $this->roles]);
    }
}
