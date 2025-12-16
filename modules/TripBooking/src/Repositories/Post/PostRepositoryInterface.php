<?php

namespace Modules\TripBooking\src\Repositories\Post;

use Modules\TripBooking\src\Repositories\RepositoryInterface;

interface PostRepositoryInterface extends RepositoryInterface
{
    public function update($request);
}