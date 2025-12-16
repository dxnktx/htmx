<?php

namespace Modules\TripBooking\src\Repositories\Partner;

use Modules\TripBooking\src\Repositories\RepositoryInterface;

interface PartnerRepositoryInterface extends RepositoryInterface
{
    public function update($request);
}