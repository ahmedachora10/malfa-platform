<?php

namespace Modules\Dashboard\App\View\Components\Cards;

use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServiceCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?Service $service = null
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('dashboard::components.cards.service-card');
    }
}
