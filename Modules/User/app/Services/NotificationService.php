<?php

namespace Modules\User\App\Services;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Modules\User\App\DTO\Notifications\UserNotificationDTO;

class NotificationService {

    private Builder $notifications;
    public function __construct() {
        $this->notifications = DB::table('notifications');
    }
    public function userNotifications(int $userId): UserNotificationDTO {
        $notifications = $this->notifications->where('notifiable_id' ,$userId)->get()
        ->map(function ($notification) {
                $notification->data = json_decode($notification->data, true);
                $notification->created_at = now()->parse($notification->created_at);
                return $notification;
        });
        return new UserNotificationDTO(
            unReadNotifications: $notifications->whereNull('read_at'),
            notifications: $notifications
        );
    }
}
