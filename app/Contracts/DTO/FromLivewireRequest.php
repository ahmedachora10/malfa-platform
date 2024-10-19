<?php

namespace App\Contracts\DTO;

use Illuminate\Database\Eloquent\Model;
interface FromLivewireRequest
{
    public static function fromLivewireRequest(array $form, ?Model $model = null) : static;
}