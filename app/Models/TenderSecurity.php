<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenderSecurity extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $casts = [
        'issue_date' => 'date',
        'return_date' => 'date',
        'amount' => 'decimal:2',
    ];
}
