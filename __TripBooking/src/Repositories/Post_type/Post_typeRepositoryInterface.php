<?php

namespace Modules\TripBooking\src\Repositories\Post_type;

use Modules\TripBooking\src\Repositories\RepositoryInterface;

interface Post_typeRepositoryInterface extends RepositoryInterface
{
    public function update($request);
}