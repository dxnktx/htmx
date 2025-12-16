<?php

namespace Modules\TripBooking\src\Repositories\Route;

use Modules\TripBooking\src\Repositories\RepositoryInterface;

interface RouteRepositoryInterface extends RepositoryInterface
{
    public function update($request);
}