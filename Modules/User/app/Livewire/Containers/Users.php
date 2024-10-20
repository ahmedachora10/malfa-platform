<?php

namespace Modules\User\Livewire\Containers;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Modules\User\App\Services\UserService;

class Users extends Component
{
    use WithPagination;

    #[Layout('dashboard::layouts.app')]
    public function render()
    {
        return view('user::livewire.containers.users', [
            'users' => app()->make(UserService::class)->paginate()
        ]);
    }
}