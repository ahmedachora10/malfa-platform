<?php

namespace Modules\Job\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Job\DTO\JobPostActionDTO;
use Modules\Job\Services\JobPostService;
use Modules\Job\Http\Requests\JobPostRequest;
use Modules\Job\Models\JobPost;

class JobController extends Controller
{
        public function __construct(private JobPostService $jobPostService) {}
    /**
     * Display a listing of the resource.
     */
    public function index(string $locale)
    {
        return view('job::jobs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $locale)
    {
        return view('job::jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobPostRequest $request, string $locale)
    {
        $this->jobPostService->store(JobPostActionDTO::fromWebRequest($request->validated()));

        return redirect()->route('jobs.index')->with('success', trans('messages.created'));
    }

    /**
     * Show the specified resource.
     */
    public function show(string $locale, JobPost $job)
    {
        return view('job::jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $locale, JobPost $job)
    {
        return view('job::jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobPostRequest $request, string $locale, JobPost $job)
    {
        $this->jobPostService->update(JobPostActionDTO::fromWebRequest($request->validated()), $job);

        return redirect()->route('jobs.index')->with('success', trans('messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $locale, JobPost $job)
    {

        $this->jobPostService->delete($job);

        return redirect()->route('jobs.index')->with('success', trans('messages.deleted'));
    }
}
