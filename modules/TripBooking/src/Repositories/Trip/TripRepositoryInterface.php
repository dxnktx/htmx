<?php

namespace Modules\TripBooking\src\Repositories\Trip;

use Modules\TripBooking\src\Repositories\RepositoryInterface;
use Modules\TripBooking\src\Http\Requests\Trip\SearchTripRequest;

interface TripRepositoryInterface extends RepositoryInterface
{
    public function update($request);

    public function search(SearchTripRequest $request);

    public function export();
}
