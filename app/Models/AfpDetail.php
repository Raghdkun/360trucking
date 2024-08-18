<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AfpDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'owner_name',
        'office_full_address',
        'yard_full_address',
        'number_of_trucks',
        'number_of_drivers',
        'amazon_scorecard_rating',
        'dispatch_handling_method',
        'main_services',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
