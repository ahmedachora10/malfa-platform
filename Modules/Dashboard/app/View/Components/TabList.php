<?php

namespace Modules\Dashboard\App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TabList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $route,
        public string $arForm = '',
        public string $enForm = '',
        public string $targetName = 'headline-content',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('dashboard::components.tab-list');
    }
}
