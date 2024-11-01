<?php

namespace Modules\Dashboard\DTO;
use App\Contracts\DTO\DTOInterface;
use App\Contracts\DTO\FromApiRequest;
use App\Contracts\DTO\FromWebRequest;
use App\Contracts\ToArray;
readonly class SubscriberActionDTO  implements DTOInterface, FromWebRequest, FromApiRequest, ToArray {
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
    public static function fromApiRequest(array $data): static
    {
        return new self(
            phone: $data['phone'],
        );
    }
}
