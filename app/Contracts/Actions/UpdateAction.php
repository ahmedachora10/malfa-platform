<?php

namespace App\Contracts\Actions;

use App\Contracts\DTO\DTOInterface;
use Illuminate\Database\Eloquent\Model;

interface UpdateAction
{
    public function update(DTOInterface $dto, Model $model) : bool;
}