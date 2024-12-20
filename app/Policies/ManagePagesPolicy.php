<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Page;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManagePagesPolicy
{
    use HandlesAuthorization;

    /**
     * Pre-qualify whether the user has enough rights to update/delete the page.
     *
     * @param  \App\Models\User  $user
     * @param  $ability
     * @return boolean
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
     * @param  \App\Models\User  $user
     * @param  \App\Models\Page  $page
     * @return boolean
     */
    public function update(User $user, Page $page)
    {
        return $user->id == $page->user_id;
    }

    /**
     * Determine whether the user can delete the page.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Page  $page
     * @return boolean
     */
    public function delete(User $user, Page $page)
    {
        // dont let not admin/editor's delete pages
        return false;
        //return $user->id == $page->user_id;
    }
}
