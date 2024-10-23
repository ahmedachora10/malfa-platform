<?php

namespace Modules\Job\Services;

use App\Contracts\Actions\PaginateAction;
use App\Contracts\Actions\StoreAction;
use App\Contracts\Actions\UpdateAction;
use App\Contracts\DTO\DTOInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Modules\Job\DTO\JobPostActionDTO;
use Modules\Job\Models\JobPost;

final class JobPostService implements StoreAction, UpdateAction, PaginateAction {
    public function __construct(private JobPost $model) {}

    /**
     * Summary of store
     * @param JobPostActionDTO $dto
     * @return JobPost
     */
    public function store(DTOInterface $dto): JobPost
    {
        return $this->model->create($dto->toArray());
    }
    public function paginate(): Paginator
    {
        return $this->model->paginate(config('app.pagination'));
    }

    /**
     * @param JobPostActionDTO $dto
     * @param JobPost $model
     * @return bool
     */
    public function update(DTOInterface $dto, Model $model): bool
    {
        return $model->update($dto->toArray());
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}
