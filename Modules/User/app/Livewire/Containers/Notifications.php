<?php

namespace Modules\User\Livewire\Containers;

use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Modules\User\Services\NotificationService;
use Modules\User\Notifications\UserAction;

class Notifications extends Component
{
    use WithPagination;

    #[Layout('dashboard::layouts.app')]
    public function render()
    {
        return view('user::livewire.containers.notifications', [
            'notifiable' => (new NotificationService())->userNotifications(request()->user()->id)
        ]);
    }
}
