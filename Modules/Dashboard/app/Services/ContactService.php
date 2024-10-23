<?php

namespace Modules\Dashboard\Services;

use App\Contracts\Actions\PaginateAction;
use App\Contracts\Actions\StoreAction;
use App\Contracts\Actions\UpdateAction;
use App\Contracts\DTO\DTOInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Modules\Dashboard\Models\Contact;
use Modules\User\DTO\ContactActionDTO;

final class ContactService implements StoreAction, UpdateAction, PaginateAction {
    public function __construct(private Contact $model) {}

    /**
     * Summary of store
     * @param ContactActionDTO $dto
     * @return Contact
     */
    public function store(DTOInterface $dto): Contact
    {
        return $this->model->create($dto->toArray());
    }
    public function paginate(): Paginator
    {
        return $this->model->paginate(config('app.pagination'));
    }

    /**
     * @param ContactActionDTO $dto
     * @param Contact $model
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
