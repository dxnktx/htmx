<?php

namespace Modules\TripBooking\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma_khoa',
        'ten_khoa'
    ];

}
