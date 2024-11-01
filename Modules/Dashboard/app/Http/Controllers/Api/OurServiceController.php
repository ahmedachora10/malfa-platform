<?php

namespace Modules\Dashboard\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Dashboard\DTO\OurServiceActionDTO;
use Modules\Dashboard\Http\Requests\OurServiceRequest;
use Modules\Dashboard\Services\OurServicesService;
use Modules\Dashboard\Transformers\OurServiceResource;

class OurServiceController extends Controller
{
    public function __construct(private OurServicesService $service) {}
    public function index()
    {
        return OurServiceResource::collection($this->service->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OurServiceRequest $request)
    {
        return new OurServiceResource(
            $this->service->store(OurServiceActionDTO::fromWebRequest($request->validated()))
        );
    }
}