<?php


namespace App\Presenters;

use Laracasts\Presenter\Presenter;
use Carbon\Carbon;

class UserPresenter extends Presenter
{


    /**
     *
     * RETURNS - An absolute path to the given image filename OR to the default avatar icon
     *
     */

    public function getAvatarSrc($src, $subdir = 'thumbs/')
    {
        $path = 'storage' . config('app.avatar_path') . '/';
        $avatar = $path . $this->id . $subdir . $src;
        if (file_exists($avatar)) {
            return  asset($avatar);
        }
        $default = 'default/default.png';
        $fallback = $path . $default;
        return  asset($fallback);
    }

    public function getAvatarAsset($user, $subdir = '/thumbs/')
    {
        $path = 'storage' . config('app.avatar_path') . '/';
        if ($this->profile) {
            $avatar = $path . $this->id . $subdir . $this->profile->avatar;

            if (file_exists($avatar)) {
                return  asset($avatar);
            }
        }

        $default = 'default/default.png';
        $fallback = $path . $default;
        return  asset($fallback);
    }

    public function getAvatarBadge()
    {

        $filename = $this->getAvatarSrc($this->profile->avatar);

        $str = '<span class="rounded-circle">
				<img src="' . $filename . '" class="img-xs rounded-circle" />
			</span>';

        return $str;
    }


    public function displayNameTooltip()
    {

        $rolenames = [];

        foreach ($this->roles as $key => $val) {
            $rolenames[] = $val->name;
        }

        $roles = array_unique(array_filter($rolenames));

        return implode(', ', $roles);
    }

    public function displayName()
    {
        if ($this->profile) {
            $forename = $this->profile->forename ?? '';
            $surname = $this->profile->surname ?? '';
            $name = trim($forename . ' ' . $surname);

            if ($name == '') {
                $name = $this->username;
            };
        } else {
            $name = $this->username;
        }
        return $name;
    }

    public function canEditPage($user, $page)
    {

        if ($user->id == $page->user_id) {
            return true;
        }

        $approved_roles = ['admin', 'editor'];
        $rolenames = [];

        foreach ($user->roles as $key => $val) {
            if (in_array($val->name, $approved_roles)) {
                return true;
            }
        }
    }
}
