<?php

namespace Modules\Authetication\src\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Authetication\src\Traits\Filterable;
use Modules\Authetication\src\Traits\HasPermissionsTrait;
use Modules\TripBooking\src\Models\Student;
use Modules\TripBooking\src\Models\Trip;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Filterable, Notifiable, HasPermissionsTrait;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uid',
        'username',
        'name',
        'email',
        'password',
        'photo',
        'ma_sinh_vien',
        'ho_va_ten',
        'gioi_tinh',
        'ngay_sinh',
        'so_cccd',
        'so_dien_thoai',
        'dia_chi',
        'noi_o_hien_tai',
        'cccd_mat_truoc',
        'cccd_mat_sau',
        'provider', 
        'provider_id',
        'token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function student() {     
        return $this->hasOne( Student::class, 'ma_sinh_vien', 'ma_sinh_vien' );            
    }

    public function trip() {     
        return $this->hasOne( Student::class, 'ma_sinh_vien', 'ma_sinh_vien' );            
    }
}
