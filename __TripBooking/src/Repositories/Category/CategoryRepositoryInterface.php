<?php

namespace Modules\TripBooking\src\Repositories\Category;

use Modules\TripBooking\src\Repositories\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function update($request);
}