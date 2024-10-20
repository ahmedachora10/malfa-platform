<?php

namespace Modules\User\App\DTO;
use App\Contracts\DTO\DTOInterface;
use App\Contracts\DTO\FromWebRequest;
use App\Contracts\ToArray;

readonly class ContactActionDTO implements DTOInterface, FromWebRequest, ToArray {
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $phone,
        public readonly string $subject,
        public readonly string $message,
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
        ];
    }

    public static function fromWebRequest(array $data): static
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            phone: $data['phone'],
            message: $data['message'],
            subject: $data['subject'],
        );
    }
}
