<?php

namespace Modules\TripBooking\src\Repositories\Gallery;

use Modules\TripBooking\src\Repositories\RepositoryInterface;

interface GalleryRepositoryInterface extends RepositoryInterface
{
    public function update($request);
}