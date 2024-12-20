<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentTaggable\Taggable;
use Laracasts\Presenter\PresentableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Page extends Model
{
    use SoftDeletes;
    use PresentableTrait;
    use Taggable;
    use SluggableScopeHelpers;

    use Sluggable, NodeTrait {
        NodeTrait::replicate as replicateNode;
        Sluggable::replicate as replicateSlug;
    }


    protected $presenter = 'App\Presenters\PagePresenter';
    protected $casts = [
        'deleted_at' => 'datetime',
        'published' => 'boolean'
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
        return $this->hasMany('App\Models\PageBlock')->where('block_published', 1)->orderBy('block_order');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     *
     * create and maintain page order tree
     */
    public function updateOrder($order_option, $order_relation_id)
    {

        $relative = Page::findOrFail($order_relation_id);

        if ($order_option == 'before') {
            $this->beforeNode($relative)->save();
        } else if ($order_option == 'after') {
            $this->afterNode($relative)->save();
        } else if ($order_option == 'child') {
            $relative->appendNode($this);
        }

        Page::fixTree();
    }


    /**
     *
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
            ]
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

    public function replicate(array $except = null)
    {
        $instance = $this->replicateNode($except);
        (new SlugService())->slug($instance, true);

        return $instance;
    }
}
