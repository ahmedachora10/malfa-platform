<?php

namespace Modules\Dashboard\Services;

use App\Contracts\Actions\PaginateAction;
use App\Contracts\Actions\StoreAction;
use App\Contracts\Actions\UpdateAction;
use App\Contracts\DTO\DTOInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Modules\Dashboard\DTO\OurServiceActionDTO;
use Modules\Dashboard\Models\OurService;

final class OurServicesService implements StoreAction, UpdateAction, PaginateAction {
    public function __construct(private OurService $model) {}

    /**
     * Summary of store
     * @param OurServiceActionDTO $dto
     * @return OurService
     */
    public function store(DTOInterface $dto): OurService
    {
        return $this->model->create($dto->toArray());
    }
    public function paginate(): Paginator
    {
        return $this->model->paginate(config('app.pagination'));
    }

    /**
     * @param OurServiceActionDTO $dto
     * @param OurService $model
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
