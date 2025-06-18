<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechGlossy extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected static function booted()
    {
        static::saved(function () {
            cache()->forget('header_tech_glossy');
        });
        static::deleted(function () {
            cache()->forget('header_tech_glossy');
        });
    }
}
