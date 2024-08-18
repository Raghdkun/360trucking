<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'date',  // Replacing start_time and end_time
        'domicile',
        'description',
        'is_confirmed',
        'address',
        
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

