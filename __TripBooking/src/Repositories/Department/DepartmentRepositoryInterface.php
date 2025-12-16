<?php

namespace Modules\TripBooking\src\Repositories\Department;

use Modules\TripBooking\src\Repositories\RepositoryInterface;

interface DepartmentRepositoryInterface extends RepositoryInterface
{
    public function update($request);
}