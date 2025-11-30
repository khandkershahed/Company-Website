<?php

namespace App\Models\Marketing;

use App\Models\User;
use App\Models\Admin\IndustrialSector;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientContact extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    // Relations to Sectors
    

    public function sector()
    {
        return $this->belongsTo(IndustrialSector::class, 'sector_id');
    }

    public function subSector()
    {
        return $this->belongsTo(IndustrialSector::class, 'sub_sector_id');
    }

    public function permittedUsers()
    {
        return $this->belongsToMany(User::class, 'client_contact_user', 'client_contact_id', 'user_id');
    }
}
