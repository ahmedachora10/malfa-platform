<?php

namespace App\Contracts;

interface HasActivityLogsDescription
{
    public function getLogDescription(): string;
}