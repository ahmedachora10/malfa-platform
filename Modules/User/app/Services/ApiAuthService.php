<?php

namespace Modules\User\Services;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Auth;
use Modules\User\DTO\UserActionDTO;
use Modules\User\DTO\UserLoginActionDTO;
use Modules\User\DTO\UserRegistrationActionDTO;
use Modules\User\Enums\UserStatus;
use Modules\User\Transformers\UserResource;

class ApiAuthService {
    use ApiResponse;
    public function __construct( private UserService $userService, private AuthManager $auth ) {
        $this->auth->setDefaultDriver('api');
    }

    /**
     * @param \Modules\User\DTO\UserRegistrationActionDTO $dto
     * @return void
     */
    public function register(UserRegistrationActionDTO $dto) {
        $newUser = $this->userService->store(
            dto: new UserActionDTO(
                name: $dto->name,
                email: $dto->email,
                password: $dto->password,
                status: UserStatus::Active
            )
        );

        return $this->sendResponse($newUser, trans('messages.created'));
    }
    public function login(UserLoginActionDTO $dto) {
        if (!$token = $this->auth->attempt($dto->toArray()))
            return $this->sendError('Unauthorised.',trans('auth'));

        $success = $this->respondWithToken($token);

        return $this->sendResponse($success, 'User login successfully.');
    }
    public function logout() {
        $this->auth->logout();
        return $this->sendResponse([], 'Successfully logged out.');
    }
    public function profile() {
        return $this->sendResponse(new UserResource($this->auth->user()), 'user profile');
    }
    public function refreshToken() {
        $success = $this->respondWithToken($this->auth->refresh());
        return $this->sendResponse($success, 'Refresh token return successfully.');
    }
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 60
        ];
    }
}