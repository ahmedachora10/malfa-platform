<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Dashboard\App\DTO\OurServiceActionDTO;
use Modules\Dashboard\App\Services\OurServicesService;
use Modules\Dashboard\Http\Requests\OurServiceRequest;
use Modules\Dashboard\Models\OurService;

class OurServiceController extends Controller
{

    public function __construct(private OurServicesService $ourServicesService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard::our-services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard::our-services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OurServiceRequest $request)
    {
        $this->ourServicesService->store(OurServiceActionDTO::fromWebRequest($request->validated()));

        return redirect()->route('our-services.index')->with('success', trans('messages.created'));
    }

    /**
     * Show the specified resource.
     */
    public function show(OurService $ourService)
    {
        return view('dashboard::our-services.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurService $ourService)
    {
        return view('dashboard::our-services.edit', compact('ourService'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OurServiceRequest $request, OurService $ourService)
    {

        $this->ourServicesService->update(OurServiceActionDTO::fromWebRequest($request->validated() + ['ourService' => $ourService]), $ourService);

        return redirect()->route('our-services.index')->with('success', trans('messages.deleted'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurService $ourService)
    {
        $this->ourServicesService->delete($ourService);
        return redirect()->route('our-services.index')->with('success', trans('messages.deleted'));
    }
}