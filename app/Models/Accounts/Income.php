<?php

namespace App\Models\Accounts;

use App\Models\Admin\Rfq;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $casts = [
        'date' => 'date',
    ];

    // Relationship to RFQ
    public function rfq()
    {
        return $this->belongsTo(Rfq::class, 'rfq_id');
    }
}
