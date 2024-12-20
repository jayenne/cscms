<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManagePagesPolicy
{
    use HandlesAuthorization;

    /**
     * Pre-qualify whether the user has enough rights to update/delete the page.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function before($user, $ability)
    {
        if ($user->isAdminOrEditor()) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the page.
     *
     * @return bool
     */
    public function update(User $user, Page $page)
    {
        return $user->id == $page->user_id;
    }

    /**
     * Determine whether the user can delete the page.
     *
     * @return bool
     */
    public function delete(User $user, Page $page)
    {
        // dont let not admin/editor's delete pages
        return false;
        //return $user->id == $page->user_id;
    }
}
