<?php

namespace App\Http\ViewComposers;

use App\Models\Page;
use Illuminate\View\View;

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
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'pages' => $this->pages,
            'pages_tree' => $this->pages->toTree(),
        ]);
    }

    protected function getAccesiblePages()
    {
        $pages = Page::with('user')->defaultOrder()->withDepth()->paginate(30);

        return $pages;
    }
}
