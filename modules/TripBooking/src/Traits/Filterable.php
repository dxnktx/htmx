<?php

namespace Modules\TripBooking\src\Traits;

use Modules\TripBooking\src\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeFilter(Builder $builder, QueryFilter $filters, array $filterFields = ['*'], array $orderFields = [])
    {
        return $filters->apply($builder, $filterFields, $orderFields);
    }
}