<?php

namespace Modules\Dashboard\App\View\Components\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal1 extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $title = '',
        public string $description = '',
        public string $style = 'display:none',
        public string $show = '',
        public bool $closeButton = true,
        public string $size= 'modal-lg',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('dashboard::components.modals.modal1');
    }
}
