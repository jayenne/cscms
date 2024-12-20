<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class MediaFile extends Model
{
    use PresentableTrait;

    protected $presenter = 'App\Presenters\FilePresenter';

    protected $casts = ['deleted_at' => 'datetime'];

    protected $table = 'media_files';

    protected $guarded = [];

    protected $fillable = [
        'title',
        'path',
        'icon',
        'user_id',
        'date',
    ];

    public function user()
    {

        return $this->belongsTo('App\Models\User');
    }
}
