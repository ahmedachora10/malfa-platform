<?php

namespace Modules\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Dashboard\Database\Factories\ContactFactory;

class Contact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'email', 'phone', 'subject', 'message'];

    // protected static function newFactory(): ContactFactory
    // {
    //     // return ContactFactory::new();
    // }
}