<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rfq extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function rfqProducts()
    {
        return $this->hasMany(RfqProduct::class);
    }
    public function quotationProducts()
    {
        return $this->hasMany(QuotationProduct::class);
    }
    public function rfqQuotation()
    {
        return $this->hasOne(RfqQuotation::class, 'rfq_id', 'id');
    }
    public function isAssigned(): bool
    {
        return !empty($this->sales_man_id_L1) || !empty($this->sales_man_id_T1) || !empty($this->sales_man_id_T2);
    }
    // Salesman L1
    public function dealCreator()
    {
        return $this->belongsTo(User::class, 'deal_creator_id');
    }
    public function salesmanL1()
    {
        return $this->belongsTo(User::class, 'sales_man_id_L1');
    }
    public function salesmanT1()
    {
        return $this->belongsTo(User::class, 'sales_man_id_T1');
    }
    public function salesmanT2()
    {
        return $this->belongsTo(User::class, 'sales_man_id_T2');
    }

}
