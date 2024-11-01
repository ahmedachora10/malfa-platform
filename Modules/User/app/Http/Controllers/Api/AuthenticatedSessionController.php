<?php

namespace Modules\User\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Modules\User\DTO\UserLoginActionDTO;
use Modules\User\DTO\UserRegistrationActionDTO;
use Modules\User\Http\Requests\Api\RegisterRequest;
use Modules\User\Services\ApiAuthService;

class AuthenticatedSessionController extends Controller
{
    public function __construct(
        private ApiAuthService $apiAuthService
    ) {}

    public function register(RegisterRequest $request) {
        return $this->apiAuthService->register(UserRegistrationActionDTO::fromApiRequest($request->validated()));
    }
    public function login(LoginRequest $request) {
        return $this->apiAuthService->login(UserLoginActionDTO::fromApiRequest($request->validated()));
    }
    public function logout() {
        return $this->apiAuthService->logout();
    }
    public function profile() {
        return $this->apiAuthService->profile();
    }
    public function refreshToken() {
        return $this->apiAuthService->refreshToken();
    }
}