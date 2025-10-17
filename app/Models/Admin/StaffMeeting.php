<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaffMeeting extends Model
{
    use HasFactory;

    // Use the correct table name
    protected $table = 'staff_meetings';

    protected $fillable = [
        'staff_id',
        'lead_by',
        'title',
        'date',
        'start_time',
        'end_time',
        'participants',
        'type',
    ];

    protected $casts = [
        'date' => 'date',
        // Note: start_time and end_time are now full datetimes in the DB based on your schema,
        // so we cast them as datetime to get Carbon instances easily.
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'participants' => 'json', // Cast to automatically handle JSON array/object
    ];

    // Define relationship with the User model for staff_id (the person who created/owns the meeting)
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    // Define relationship with the User model for lead_by
    public function leader()
    {
        return $this->belongsTo(User::class, 'lead_by');
    }

    // Accessor for the 'type' to match your tab names
    public function getMeetingTypeAttribute()
    {
        return $this->type === 'office' ? 'In Office' : 'Out Of Office';
    }
}
