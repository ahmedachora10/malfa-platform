<?php

namespace Modules\Dashboard\Models;

use App\Traits\HasThumbnail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

// use Modules\Dashboard\Database\Factories\OurServiceFactory;

class OurService extends Model
{
    use HasFactory, HasThumbnail, HasTranslations;

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
}