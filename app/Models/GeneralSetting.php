<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $table = 'generals_settings';

    protected $fillable = [
        'website_name',
        'description',
        'tags',
        'phone',
        'google_map_key,',
        'address',          // New field
        'email',            // New field
        'facebook_link',    // New field
        'youtube_link',     // New field
        'instagram_link',   // New field
        'linkedin_link',
        'linkedin_link',
        'logo',



    ];
}
