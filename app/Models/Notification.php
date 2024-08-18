<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'message',
        'is_read',
        'url',
        'notifiable_type',
        'notifiable_id',
        'data',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Polymorphic relationship to the notifiable entity.
     */
    public function notifiable()
    {
        return $this->morphTo();
    }
}
