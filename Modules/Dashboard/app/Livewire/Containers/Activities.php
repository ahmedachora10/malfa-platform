<?php

namespace Modules\Dashboard\Livewire\Containers;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Modules\Dashboard\Services\ActivityService;
use Spatie\Activitylog\Models\Activity;

class Activities extends Component
{
    use WithPagination;

    public function delete(Activity $activity) {
        app()->make(ActivityService::class)->delete($activity);
        $this->dispatch('alert-message', message: trans('messages.deleted'));
    }

    #[Layout('dashboard::components.layouts.app')]
    public function render()
    {
        return view('dashboard::livewire.containers.activities', [
            'activities' => app()->make(ActivityService::class)->paginate()
        ]);
    }
}