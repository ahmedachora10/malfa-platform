<?php

namespace Modules\Dashboard\App\View\Components\Sidebar;

use Illuminate\View\Component;

class Link extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $link = 'javascript:viod(0)', public $icon = '', public $title = null, public bool $hasSubMenu = false, public int|bool $notification = false)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('dashboard::components.sidebar.link');
    }
}