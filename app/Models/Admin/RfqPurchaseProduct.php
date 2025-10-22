<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RfqPurchaseProduct extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function rfq()
    {
        return $this->belongsTo(Rfq::class, 'rfq_id', 'id');
    }
    public function purchase()
    {
        return $this->belongsTo(RfqPurchase::class, 'purchase_id', 'id');
    }

}
