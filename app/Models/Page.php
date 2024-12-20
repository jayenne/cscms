<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Laracasts\Presenter\PresentableTrait;

class Page extends Model
{
    use NodeTrait, Sluggable {
        NodeTrait::replicate as replicateNode;
        Sluggable::replicate as replicateSlug;
    }
    use PresentableTrait;
    use SluggableScopeHelpers;
    use SoftDeletes;
    use Taggable;

    protected $presenter = \App\Presenters\PagePresenter::class;

    protected $casts = [
        'deleted_at' => 'datetime',
        'published' => 'boolean',
    ];

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'add_to_nav',
        'title_nav',
        'layout',
        'redirect',
        'target',
        'publish_on',
        'publish_off',
        'published',
        'status',
        'approved_id',
        'approved_on',
        'restricted',
    ];

    /**
     * Get page blocks
     */
    public function blocks()
    {
        return $this->hasMany(\App\Models\PageBlock::class)->where('block_published', 1)->orderBy('block_order');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * create and maintain page order tree
     */
    public function updateOrder($order_option, $order_relation_id)
    {

        $relative = Page::findOrFail($order_relation_id);

        if ($order_option == 'before') {
            $this->beforeNode($relative)->save();
        } elseif ($order_option == 'after') {
            $this->afterNode($relative)->save();
        } elseif ($order_option == 'child') {
            $relative->appendNode($this);
        }

        Page::fixTree();
    }

    /**
     * Create & Maintain page slugs
     */
    public function sluggable(): array
    {

        return [
            'slug' => [
                'source' => 'slug',
                'onUpdate' => true, // If you want slugs to update on model updates
                'unique' => true, // If you want unique slugs
                'includeTrashed' => false, // If you don't want to check trashed models for uniqueness
            ],
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    /*
    public function getRouteKeyName()
    {
        return 'slug';
    }
    */

    public function replicate(?array $except = null)
    {
        $instance = $this->replicateNode($except);
        (new SlugService)->slug($instance, true);

        return $instance;
    }
}
