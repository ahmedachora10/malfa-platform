<?php

namespace Modules\Dashboard\Traits;

use App\Contracts\HasActivityLogsDescription;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

trait LogActivityOptions {
    use LogsActivity;
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName(str($this->table)->replace('_', '-')->value())
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(
                callback: fn(string $eventName): string|null => $this instanceof HasActivityLogsDescription ? trans('dashboard::logs.'. strtolower($eventName), ['name' => $this->getLogDescription()]) : $eventName
            );
    }
}
