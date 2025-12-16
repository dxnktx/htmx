<?php

namespace Modules\TripBooking\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma_tuyen_duong',
        'ten_tuyen_duong',
        'khu_vuc',
        'tinh_den',
        'huyen_den',
        'xa_den'
    ];

    // Một đơn vị có nhiều sinh viên
    public function stations() {
        return $this->hasMany(Station::class, 'ma_tuyen_duong', 'ma_tuyen_duong');            
    }
}
