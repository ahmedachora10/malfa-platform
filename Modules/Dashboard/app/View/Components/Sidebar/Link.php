<?php

namespace Modules\Dashboard\App\View\Components\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Link extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $link = 'javascript:viod(0)', public $icon = '', public $title = null, public bool $hasSubMenu = false, public int|bool $notification = false)
    {
        //
    }

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('dashboard::components.sidebar/link');
    }
}