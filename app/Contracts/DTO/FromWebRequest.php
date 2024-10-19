<?php

namespace App\Contracts\DTO;

interface FromWebRequest
{
    public static function fromWebRequest(array $data) : static;
}