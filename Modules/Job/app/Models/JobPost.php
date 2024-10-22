<?php

namespace Modules\Job\Models;

use App\Contracts\HasActivityLogsDescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Dashboard\App\Traits\LogActivityOptions;
use Spatie\Translatable\HasTranslations;

// use Modules\Job\Database\Factories\JobPostFactory;

class JobPost extends Model implements HasActivityLogsDescription
{
    use HasFactory, HasTranslations, LogActivityOptions;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title'];
    public $translatable = ['title'];

    // protected static function newFactory(): JobPostFactory
    // {
    //     // return JobPostFactory::new();
    // }

    public function getLogDescription(): string
    {
        return $this->title;
    }
}