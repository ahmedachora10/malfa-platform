<?php

namespace Modules\Dashboard\DTO;
use App\Contracts\DTO\DTOInterface;
use App\Contracts\DTO\FromWebRequest;
use App\Contracts\ToArray;
use App\Traits\PrepareAttachments;
use Modules\Dashboard\Models\OurService;

readonly class OurServiceActionDTO implements DTOInterface, FromWebRequest, ToArray {
    use PrepareAttachments;
    public function __construct(
        public readonly array $title,
        public readonly array $description,
        public readonly string $image,
        public readonly ?OurService $ourService = null,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
        ];
    }

    public static function fromWebRequest(array $data): static
    {
        $ourService = $data['ourService'] ?? null;
        return new self(
            title: $data['title'],
            description: $data['description'],
            image: self::prepareAttachment(newFile: $data['image'] ?? null, oldFilePath: $ourService?->image, destination: 'users/avatars/'),
            ourService: $ourService
        );
    }
}
