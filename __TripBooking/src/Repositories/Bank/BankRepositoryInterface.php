<?php

namespace Modules\TripBooking\src\Repositories\Bank;

use Modules\TripBooking\src\Repositories\RepositoryInterface;

interface BankRepositoryInterface extends RepositoryInterface
{
    public function update($request);
}