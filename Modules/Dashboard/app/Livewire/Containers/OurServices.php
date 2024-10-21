<?php

namespace Modules\Dashboard\Livewire\Containers;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Modules\Dashboard\App\Services\OurServicesService;

class OurServices extends Component
{
    use WithPagination;

    #[Layout('dashboard::layouts.app')]
    public function render()
    {
        return view('dashboard::livewire.containers.our-services', [
            'services' => app()->make(OurServicesService::class)->paginate()
        ]);
    }
}