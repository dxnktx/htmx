<?php

namespace Modules\TripBooking\src\Repositories\Station;

use Modules\TripBooking\src\Repositories\RepositoryInterface;

interface StationRepositoryInterface extends RepositoryInterface
{
    public function update($request);
}