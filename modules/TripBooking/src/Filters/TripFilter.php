<?php

namespace Modules\TripBooking\src\Filters;

use Illuminate\Support\Facades\Route;

class TripFilter extends QueryFilter
{
    protected $filterable = [];

    public function filterKeyword($value)
    {
        return $this->builder
            ->where(function ($query) use ($value) {
                $query->where('ma_sinh_vien', 'like', '%' . $value . '%');
            });
    }
}
