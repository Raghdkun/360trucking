<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    // protected $table = 'carousels';


    protected $fillable = [
        'title',
        'description',
        'button_text',
        'button_url',
        'image',
    ];
}
