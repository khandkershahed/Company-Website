<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $slugSourceColumn = 'title';
    protected $casts = [
        'category_id' => 'array',
        'brand_id'    => 'array',
        'industry_id' => 'array',
        'solution_id' => 'array',
    ];
    protected static function booted()
    {
        static::saved(function () {
            cache()->forget('header_blogs');
        });
        static::deleted(function () {
            cache()->forget('header_blogs');
        });
    }
}
