<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'picture',
        'start_date',
        'end_date',
        'cost',
        'organizer',
        'contact_no',
        'email',
        'website',
        'venue'
    ];
}
