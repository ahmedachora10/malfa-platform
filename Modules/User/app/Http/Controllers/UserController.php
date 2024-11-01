<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\User\DTO\UserActionDTO;
use Modules\User\Enums\UserStatus;
use Modules\User\Services\UserService;
use Modules\User\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function __construct(private UserService $userService) {}
    /**
     * Display a listing of the resource.
     */
    public function index(string $locale)
    {
        return view('user::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $locale)
    {
        $status = UserStatus::cases();
        return view('user::create',compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request, string $locale)
    {
        $this->userService->store(UserActionDTO::fromWebRequest($request->validated()));
        return redirect()->route('users.index')->with('success', trans('messages.created'));
    }

    /**
     * Show the specified resource.
     */
    public function show(string $locale, User $user)
    {
        return 'show a user details';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $locale, User $user)
    {
        $status = UserStatus::cases();
        return view('user::edit',compact('user', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $locale, User $user)
    {
        $this->userService->update(UserActionDTO::fromWebRequest($request->validated() + ['user' => $user]), $user);
        return redirect()->route('users.index')->with('success', trans('messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $locale, User $user)
    {
        $this->userService->delete(model: $user);
        return redirect()->route('users.index')->with('success', trans('messages.deleted'));
    }
}
