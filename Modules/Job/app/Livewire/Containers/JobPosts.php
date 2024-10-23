<?php

namespace Modules\Job\Livewire\Containers;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Modules\Job\Services\JobPostService;

class JobPosts extends Component
{
    use WithPagination;

    #[Layout('dashboard::layouts.app')]
    public function render()
    {
        return view('job::livewire.containers.job-posts', [
            'jobs' => app()->make(JobPostService::class)->paginate()
        ]);
    }
}
