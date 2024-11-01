<?php

namespace Modules\Dashboard\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Modules\Dashboard\DTO\SubscriberActionDTO;
use Modules\Dashboard\Http\Requests\SubscriberRequest;
use Modules\Dashboard\Services\SubscriberService;
use Modules\Dashboard\Transformers\SubscriberResource;

class SubscriberController extends Controller
{
    use ApiResponse;
    public function __construct(private SubscriberService $subscriberService) {}

    public function __invoke(SubscriberRequest $request)
    {
        return $this->sendResponse(
            result: new SubscriberResource(
                $this->subscriberService->store(
                    dto: SubscriberActionDTO::fromApiRequest($request->validated())
                )
            ),
            message: trans('messages.created')
        );
    }
}