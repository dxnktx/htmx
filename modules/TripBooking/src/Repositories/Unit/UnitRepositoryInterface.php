<?php

namespace Modules\TripBooking\src\Repositories\Unit;

use Modules\TripBooking\src\Repositories\RepositoryInterface;

interface UnitRepositoryInterface extends RepositoryInterface
{
    public function update($request);
}