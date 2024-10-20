<?php

namespace App\Traits;

use App\Services\UploadFileService;
use Illuminate\Http\UploadedFile;

trait PrepareAttachments
{
    public static function prepareAttachment(?UploadedFile $newFile, ?string $oldFilePath = null, string $destination) {
        return (new UploadFileService)->update($newFile, $oldFilePath, $destination);
    }
}