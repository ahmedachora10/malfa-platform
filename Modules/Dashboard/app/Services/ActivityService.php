<?php

namespace Modules\Dashboard\App\Services;

use App\Contracts\Actions\PaginateAction;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;

final class ActivityService implements PaginateAction {
    public function __construct(private Activity $model) {}

    public function paginate(): Paginator
    {
        return $this->model
            ->with('causer')
            ->latest()
            ->paginate(config('app.pagination'));
    }
    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}