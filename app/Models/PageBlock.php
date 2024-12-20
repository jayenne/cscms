<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

class PageBlock extends Model
{
    //
    use SoftDeletes;
    use PresentableTrait;

    protected $presenter = 'App\Presenters\PageBlockPresenter';

    protected $fillable = [
        'block_uid',
        'user_id',
        'page_id',
        'block_lid',
        'block_name',
        'block_anchor',
        'block_attribute_fields',
        'block_attribute_values',
        'block_content_values',
        'block_content_values_approved',
        'block_order',
        'block_offset',
        'block_published',
        'block_approved_on'
    ];

    public function library()
    {
        return $this->belongsTo('App\Models\PageBlockLibrary', 'block_lid', 'block_lid');
    }

    public function page()
    {
        return $this->belongsTo('App\Models\Page');
    }
}
