<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class PageBlockLibrary extends Model
{
    use PresentableTrait;

    protected $presenter = 'App\Presenters\PageBlockPresenter';

    protected $fillable = [
        'block_name',
        'block_description',
        'block_template',

        'block_attribute_fields',
        'block_attribute_values',

        'block_content_fields',
        'block_content_values',

    ];

    public function block()
    {

        return $this->hasMany('App\Models\PageBlock', 'block_lid', 'block_lid');
    }
}
