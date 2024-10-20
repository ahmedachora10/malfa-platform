<?php

namespace Modules\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Dashboard\Database\Factories\SubscriberFactory;

class Subscriber extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['phone'];

    // protected static function newFactory(): SubscriberFactory
    // {
    //     // return SubscriberFactory::new();
    // }
}