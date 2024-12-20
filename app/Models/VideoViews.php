<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoViews extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'filename',
        'time',
        'end',
    ];

    public function users()
    {
        return $this->morphedByMany(User::class);
    }
}
