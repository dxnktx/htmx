<?php

namespace Modules\TripBooking\src\Repositories\Banner;

use Modules\TripBooking\src\Repositories\RepositoryInterface;

interface BannerRepositoryInterface extends RepositoryInterface
{
    public function update($request);
}