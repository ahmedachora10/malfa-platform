<?php

namespace Modules\Dashboard\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Alert extends Component
{
    public ?string $message = null;
    public string $type = 'success';

    #[On('alert-message')]
    public function setMessage(string $message, string $type = 'success'): void {
        $this->message = $message;
        $this->type = $type;
    }
    public function render()
    {
        return view('dashboard::livewire.alert');
    }
}