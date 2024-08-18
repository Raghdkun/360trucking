<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'date',
        'start_time',
        'end_time',
        'status',
    ];

    /**
     * Get the booking that owns the schedule.
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
