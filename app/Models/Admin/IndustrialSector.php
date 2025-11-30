<?php

namespace App\Models\Admin;

use App\Traits\HasSlug;
use App\Models\TenderSite;
use App\Models\TenderAccessPass;
use App\Models\Marketing\ClientContact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IndustrialSector extends Model
{
    use HasFactory, HasSlug;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $slugSourceColumn = 'name';
    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(IndustrialSector::class, 'parent_id');
    }

    /**
     * Relationship: Get child sectors.
     */
    public function children()
    {
        return $this->hasMany(IndustrialSector::class, 'parent_id');
    }

    public function tenderSites()
    {
        return $this->hasMany(TenderSite::class, 'category');
    }

    // tenderaccesspasses
    public function tenderAccessPasses()
    {
        return $this->hasMany(TenderAccessPass::class, 'sector_id');
    }

    public function clientContacts()
    {
        return $this->hasMany(ClientContact::class, 'sector_id');
    }
}
