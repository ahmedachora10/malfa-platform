<?php

namespace App\Contracts\Actions;

use Illuminate\Database\Eloquent\Model;

interface DeleteAction
{
    public function delete(Model $model): bool;
}