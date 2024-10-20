<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\User\App\DTO\UserActionDTO;
use Modules\User\App\Enums\UserStatus;
use Modules\User\App\Services\UserService;
use Modules\User\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function __construct(private UserService $userService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = UserStatus::cases();
        return view('user::create',compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->userService->store(UserActionDTO::fromWebRequest($request->validated()));
        return redirect()->route('users.index')->with('success', trans('messages.created'));
    }

    /**
     * Show the specified resource.
     */
    public function show(User $user)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $status = UserStatus::cases();
        return view('user::edit',compact('user', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        // dd($request->validated(), UserActionDTO::fromWebRequest($request->validated() + ['user' => $user]));
        $this->userService->update(UserActionDTO::fromWebRequest($request->validated() + ['user' => $user]), $user);
        return redirect()->route('users.index')->with('success', trans('messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->userService->delete(model: $user);
        return redirect()->route('users.index')->with('success', trans('messages.deleted'));
    }
}