<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Auth;
use App\Models\PageBlockLibrary;

class PageBlockLibraryComposer
{

    public $blocks_library = [];

    /**
     * Create a blocks composer.
     *
     * @return void
     */
    public function __construct()
    {

        $this->blocks_library = PageBlockLibrary::orderBy('block_name', 'asc')->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $num = count($this->blocks_library) ? count($this->blocks_library) : 0;

        $view->with([
            'blocks_library' => $this->blocks_library,
            'blocks_num' => $num
        ]);
    }
}
