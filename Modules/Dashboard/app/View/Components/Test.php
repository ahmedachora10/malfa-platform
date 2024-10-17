<?php

namespace Modules\Dashboard\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Test extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('dashboard::components.test');
    }
}
