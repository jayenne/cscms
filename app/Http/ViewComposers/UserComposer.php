<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Auth;
use App\Models\User;
use App\Models\Role;

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
   * @param  View  $view
   * @return void
   */
  public function compose(View $view)
  {

    $view->with(['users' => $this->users, 'roles' => $this->roles]);
  }
}
