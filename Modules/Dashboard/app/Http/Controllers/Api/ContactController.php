<?php


namespace Modules\Dashboard\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Modules\Dashboard\DTO\ContactActionDTO;
use Modules\Dashboard\Http\Requests\ContactRequest;
use Modules\Dashboard\Services\ContactService;
use Modules\Dashboard\Transformers\ContactResource;

class ContactController extends Controller
{
    use ApiResponse;
    public function __construct(private ContactService $contactService) {}
    public function __invoke(ContactRequest $request)
    {
        return $this->sendResponse(
            result: new ContactResource(
                $this->contactService->store(
                    dto: ContactActionDTO::fromApiRequest($request->validated())
                )
            ),
            message: trans('messages.created')
        );
    }
}