<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Dashboard\Services\SubscriberService;
use Modules\Dashboard\Models\Subscriber;

class SubscriberController extends Controller
{
    public function __construct(private SubscriberService $subscriberService) {}
    public function index($locale)
    {
        return view('dashboard::subscribers.index');
    }
    public function destroy($locale, Subscriber $subscriber)
    {
        $this->subscriberService->delete($subscriber);
        return redirect()->route('subscribers.index')->with('success', trans('messages.deleted'));
    }
}
