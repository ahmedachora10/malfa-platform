<?php

namespace Modules\Dashboard\Models;

use App\Contracts\HasActivityLogsDescription;
use App\Traits\HasThumbnail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Dashboard\App\Traits\LogActivityOptions;
use Spatie\Translatable\HasTranslations;

// use Modules\Dashboard\Database\Factories\OurServiceFactory;

class OurService extends Model implements HasActivityLogsDescription
{
    use HasFactory, HasThumbnail, HasTranslations, LogActivityOptions;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'sort'
    ];

    public $translatable = ['title', 'description'];

    // protected static function newFactory(): OurServiceFactory
    // {
    //     // return OurServiceFactory::new();
    // }

    public function getLogDescription(): string
    {
        return $this->title;
    }
}