<?php

namespace Modules\TripBooking\src\Repositories\Activity;

use Modules\TripBooking\src\Repositories\RepositoryInterface;

interface ActivityRepositoryInterface extends RepositoryInterface
{
    public function update($request);
}