<?php

namespace Modules\Job\App\DTO;
use App\Contracts\DTO\DTOInterface;
use App\Contracts\DTO\FromWebRequest;
use App\Contracts\ToArray;

readonly class JobPostActionDTO  implements DTOInterface, FromWebRequest, ToArray {
    public function __construct(
        public readonly array $title,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
        ];
    }
    public static function fromWebRequest(array $data): static
    {
        return new self(
            title: $data['title'],
        );
    }
}