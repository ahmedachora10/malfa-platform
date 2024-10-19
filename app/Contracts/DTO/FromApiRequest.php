<?php

namespace App\Contracts\DTO;

interface FromApiRequest
{
    public static function fromApiRequest(array $data) : static;
}