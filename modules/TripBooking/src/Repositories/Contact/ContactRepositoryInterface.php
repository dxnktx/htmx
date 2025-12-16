<?php

namespace Modules\TripBooking\src\Repositories\Contact;

use Modules\TripBooking\src\Repositories\RepositoryInterface;

interface ContactRepositoryInterface extends RepositoryInterface
{
    public function update($request);
}