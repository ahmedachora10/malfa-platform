<?php

namespace Modules\Dashboard\View\Components;

use Illuminate\View\Component;

class Logo extends Component
{
    public $image = '';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($image = '')
    {
        $this->image = $image ?? asset(str_replace('public/', 'storage/', setting('logo')));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('dashboard::components.logo', ['image' => $this->image]);
    }
}