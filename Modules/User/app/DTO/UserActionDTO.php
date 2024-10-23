<?php

namespace Modules\User\DTO;
use App\Contracts\DTO\DTOInterface;
use App\Contracts\DTO\FromWebRequest;
use App\Contracts\ToArray;
use App\Models\User;
use App\Services\UploadFileService;
use App\Traits\PrepareAttachments;
use Illuminate\Support\Facades\Hash;
use Modules\User\Enums\UserStatus;

readonly class UserActionDTO implements DTOInterface, FromWebRequest, ToArray {
    use PrepareAttachments;
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly UserStatus $status,
        public readonly ?string $password = null,
        public readonly ?string $image = null,
        public readonly ?User $user = null
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'image' => $this->image,
            'status' => $this->status->value,
        ];
    }

    public static function fromWebRequest(array $data): static
    {
        $user = $data['user'] ?? null;
        return new self(
            name: $data['name'],
            email: $data['email'],
            password: $user && !$data['password'] ? $user->password : Hash::make($data['password']),
            image: self::prepareAttachment(newFile: $data['image'] ?? null, oldFilePath: $user?->image, destination: 'users/avatars/'),
            status: UserStatus::tryFrom($data['status']) ?? UserStatus::Active,
            user: $user ?? null
        );
    }
}
