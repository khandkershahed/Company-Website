<?php

namespace App\Models;

use App\Models\Admin\IndustrialSector;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TenderSite extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public function industrialSector()
    {
        return $this->belongsTo(IndustrialSector::class, 'category');
    }
}
