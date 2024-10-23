<?php

namespace Modules\User\DTO\Notifications;
use App\Contracts\DTO\DTOInterface;
use Illuminate\Support\Collection;

readonly class UserNotificationDTO implements DTOInterface {
    public function __construct(
        public readonly Collection $unReadNotifications,
        public readonly Collection $notifications,
    ) {}
}
