<?php

namespace Modules\Dashboard\App\View\Components\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table2 extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public array $columns = [])
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('dashboard::components.tables.table2');
    }
}
