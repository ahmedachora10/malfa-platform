<?php

namespace Modules\User\Services;

use App\Contracts\Actions\DeleteAction;
use App\Contracts\Actions\PaginateAction;
use App\Contracts\Actions\StoreAction;
use App\Contracts\Actions\UpdateAction;
use App\Contracts\DTO\DTOInterface;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Modules\User\DTO\UserActionDTO;

class UserService implements StoreAction,  UpdateAction, DeleteAction, PaginateAction {
    public function __construct( private User $model ) {}

    /**
     * Summary of store
     * @param UserActionDTO $dto
     * @return \App\Models\User
     */
    public function store(DTOInterface $dto): User
    {
        return $this->model->create($dto->toArray());
    }
    public function paginate(): Paginator
    {
        return $this->model->paginate(config('app.pagination'));
    }

    /**
     * @param UserActionDTO $dto
     * @param User $model
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
