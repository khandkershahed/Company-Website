<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('site_setting');
        });
    }
}
