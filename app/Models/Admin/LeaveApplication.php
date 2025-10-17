<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveApplication extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public function substitute()
    {
        return $this->belongsTo((User::class), 'substitute_id');
    }
    public function user()
    {
        return $this->belongsTo((User::class), 'employee_id');
    }
    public function supervisor()
    {
        return $this->belongsTo((User::class), 'supervisor_id');
    }
}
