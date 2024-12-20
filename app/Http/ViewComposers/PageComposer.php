<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Auth;
use App\Models\Page;

class PageComposer
{

    public $pages = [];

    /**
     * Create a pages composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->pages = $this->getAccesiblePages();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'pages' => $this->pages,
            'pages_tree' => $this->pages->toTree()
        ]);
    }


    protected function getAccesiblePages()
    {
        $pages = Page::with('user')->defaultOrder()->withDepth()->paginate(30);
        return $pages;
    }
}
