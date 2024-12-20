<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use SoftDeletes;

    protected $casts = ['deleted_at' => 'datetime'];

    protected $fillable = [
        'user_id',
        'forename',
        'surname',
        'avatar',
        'phone',
        'position',
        'biography',
        'links',
        'picture',
    ];

    //
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
