<?php

namespace Modules\TripBooking\src\Repositories\Trip;

use Modules\TripBooking\src\Repositories\RepositoryInterface;

interface TripRepositoryInterface extends RepositoryInterface
{
    public function update($request);
    
    public function export();
    
}