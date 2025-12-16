<?php

namespace Modules\TripBooking\src\Models;

use Modules\TripBooking\src\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Authetication\src\Models\User;

class Trip extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'ma_sinh_vien',
        'hoan_canh_gia_dinh',
        'giay_xac_nhan',
        'hoan_canh_ban_than',
        'thong_tin_nguoi_lien_he',
        'so_dien_thoai_nguoi_than',
        'hanh_ly_mang_theo',
        'van_de_suc_khoe',
        'tinh_thanh',
        'tinh_thanh',
        'dia_diem_xuong_xe',
        'dong_y_cam_ket'
    ];

    public function rUser() {     
        return $this->belongsTo( User::class, 'ma_sinh_vien', 'ma_sinh_vien' );            
    }
    
    public function rStudent() {     
        return $this->belongsTo( Student::class, 'ma_sinh_vien', 'ma_sinh_vien' );            
    }
}
