<?php

namespace Modules\User\App\DTO;
use App\Contracts\DTO\DTOInterface;
use App\Contracts\DTO\FromWebRequest;
use App\Contracts\ToArray;
readonly class SubscriberActionDTO  implements DTOInterface, FromWebRequest, ToArray {
    public function __construct(
        public readonly string $phone,
    ) {}

    public function toArray(): array
    {
        return [
            'phone' => $this->phone,
        ];
    }

    public static function fromWebRequest(array $data): static
    {
        return new self(
            phone: $data['phone'],
        );
    }
}
