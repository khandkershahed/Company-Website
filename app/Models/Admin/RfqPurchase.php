<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RfqPurchase extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    // belongs to Rfq
    public function rfq()
    {
        return $this->belongsTo(Rfq::class, 'rfq_id', 'id');
    }

    public function purchaseProducts()
    {
        return $this->hasMany(RfqPurchaseProduct::class, 'purchase_id', 'id');
    }
}
