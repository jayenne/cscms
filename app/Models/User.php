<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Laracasts\Presenter\PresentableTrait;

class User extends Authenticatable
{
    use Impersonate;
    use Notifiable;
    use PresentableTrait;
    use SoftDeletes;

    protected $presenter = 'App\Presenters\UserPresenter';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'roles',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get profile
     */
    public function profile()
    {
        return $this->hasOne('App\Models\UserProfile');
    }

    /**
     * Get pages
     */
    public function pages()
    {
        return $this->hasMany('App\Models\Page');
    }

    /**
     * Get files
     */
    public function files()
    {
        return $this->hasMany('App\Models\MediaFile');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    /**
     * Check if a user has any role
     *
     * @var roles
     */
    public function hasAnyRole($roles)
    {
        return $this->roles()->whereIn('name', $roles)->first() != null;
    }

    /**
     * Check if a user has a given role by name
     *
     * @var role
     */
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->first() != null;
    }

    /**
     * Check if a user is an admin or editor
     *
     * @var role
     */
    public function isBackend()
    {
        return $this->hasAnyRole(['developer', 'admin', 'editor', 'author']);
    }

    public function isAdminOrEditor()
    {
        return $this->hasAnyRole(['developer', 'admin', 'editor']);
    }

    /**
     * Check if a user is an admin
     *
     * @var role
     */
    public function isDeveloper()
    {
        return $this->roles()->where('name', 'developer')->first();
    }

    public function isAdmin()
    {
        return $this->roles()->where('name', 'admin')->first();
    }

    /**
     * Check if a user is an editor
     *
     * @var role
     */
    public function isEditor()
    {
        return $this->roles()->where('name', 'editor')->first();
    }

    /**
     * Check if a user is an author
     *
     * @var role
     */
    public function isAuthor()
    {
        return $this->roles()->where('name', 'author')->first();
    }

    public function isMember()
    {
        return $this->roles()->where('name', 'member')->first();
    }

    /**
     * @return bool
     */
    public function canImpersonate()
    {
        // For example

        return $this->isAdminOrEditor();
    }

    /**
     * @return bool
     */
    public function canBeImpersonated()
    {
        // For example
        return true;
    }
}
