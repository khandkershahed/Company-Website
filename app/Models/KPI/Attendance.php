<?php

namespace App\Models\KPI;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    // belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
