<?php

namespace Modules\Dashboard\App\Services;

use App\Contracts\Actions\PaginateAction;
use App\Contracts\Actions\StoreAction;
use App\Contracts\Actions\UpdateAction;
use App\Contracts\DTO\DTOInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Modules\Dashboard\Models\Subscriber;
use Modules\User\App\DTO\SubscriberActionDTO;

final class SubscriberService implements StoreAction, UpdateAction, PaginateAction {
    public function __construct(private Subscriber $model) {}

    /**
     * Summary of store
     * @param SubscriberActionDTO $dto
     * @return Subscriber
     */
    public function store(DTOInterface $dto): Subscriber
    {
        return $this->model->create($dto->toArray());
    }
    public function paginate(): Paginator
    {
        return $this->model->paginate(config('app.pagination'));
    }

    /**
     * @param SubscriberActionDTO $dto
     * @param Subscriber $model
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