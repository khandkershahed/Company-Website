<?php

namespace App\Models\Admin;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingSector extends Model
{
    use HasFactory,HasSlug;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $slugSourceColumn = 'name';
    protected $guarded = [];
}
