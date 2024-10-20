<?php

namespace App\Contracts\Actions;

use App\Contracts\DTO\DTOInterface;
use Illuminate\Database\Eloquent\Model;

interface StoreAction
{
    public function store(DTOInterface $dto) : Model;
}