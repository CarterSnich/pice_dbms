<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsCarousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename'
    ];
}
