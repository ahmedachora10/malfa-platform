<?php

namespace Modules\Dashboard\App\View\Components\Cards;

use Illuminate\View\Component;

class Sample extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $column = 'col-md-6')
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
        return view('dashboard::components.cards.sample');
    }
}
