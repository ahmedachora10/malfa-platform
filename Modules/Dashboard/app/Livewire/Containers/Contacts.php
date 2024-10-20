<?php

namespace Modules\Dashboard\Livewire\Containers;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Modules\Dashboard\App\Services\ContactService;

class Contacts extends Component
{
    use WithPagination;

    #[Layout('dashboard::layouts.app')]
    public function render()
    {
        return view('dashboard::livewire.containers.contacts', [
            'contacts' => app()->make(ContactService::class)->paginate()
        ]);
    }
}