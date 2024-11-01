<?php

namespace Modules\User\DTO;
use App\Contracts\DTO\DTOInterface;
use App\Contracts\DTO\FromApiRequest;
use App\Contracts\ToArray;use App\Traits\PrepareAttachments;
use Illuminate\Support\Facades\Hash;
use Modules\User\Enums\UserStatus;

readonly class UserRegistrationActionDTO implements DTOInterface, FromApiRequest, ToArray {
    use PrepareAttachments;
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }

    public static function fromApiRequest(array $data): static
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            password: Hash::make($data['password']),
        );
    }
}
