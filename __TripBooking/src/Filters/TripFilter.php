<?php

namespace Modules\TripBooking\src\Filters;
use Illuminate\Support\Facades\Route;

class TripFilter extends QueryFilter
{
    protected $filterable = [
        
    ];
    
    public function filterTest()
    {
        return $this->builder;
    }
}