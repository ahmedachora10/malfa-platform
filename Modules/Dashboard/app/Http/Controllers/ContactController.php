<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Dashboard\App\Services\ContactService;
use Modules\Dashboard\Models\Contact;

class ContactController extends Controller
{
    public function __construct(private ContactService $contactService) {}
    /**
     * Display a listing of the resource.
     */
    public function index(string $locale)
    {
        return view('dashboard::contact.index');
    }

    public function destroy(string $locale, Contact $contact)
    {
        $this->contactService->delete($contact);
        return redirect()->route('contact.index')->with('success', trans('messages.deleted'));
    }
}
