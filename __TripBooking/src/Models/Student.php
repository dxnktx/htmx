<?php

namespace Modules\TripBooking\src\Models;

use Modules\TripBooking\src\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Authetication\src\Models\User;

class Student extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'ma_sinh_vien',
        'ten_sinh_vien',
        'don_vi_dao_tao',
        'khoa_bo_mon',
        'sinh_vien_nam_thu',
        'diem_trung_binh',
        'thanh_tich_hoat_dong_xa_hoi',
        'danh_hieu_5_tot'
    ];

    public function rUser() {     
        return $this->belongsTo( User::class, 'ma_sinh_vien', 'ma_sinh_vien' );            
    }
    
    public function rTrip() {     
        return $this->hasOne( Trip::class, 'ma_sinh_vien', 'ma_sinh_vien' );            
    }
}
