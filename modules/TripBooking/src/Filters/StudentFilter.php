<?php

namespace Modules\TripBooking\src\Filters;

use Illuminate\Support\Facades\Route;

class StudentFilter extends QueryFilter
{
    protected $filterable = [
        'don_vi_dao_tao',
        'sinh_vien_nam_thu',
    ];

    public function filterKeyword($value)
    {
        return $this->builder
            ->where(function ($query) use ($value) {
                $query->where('ten_sinh_vien', 'like', '%' . $value . '%')
                    ->orWhere('ma_sinh_vien', 'like', '%' . $value . '%');
            });
    }
}
