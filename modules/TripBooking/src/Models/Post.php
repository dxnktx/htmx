<?php

namespace Modules\TripBooking\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'slug',
        'short_description',
        'description',
        'total_view',
        'photo'
    ];
}
