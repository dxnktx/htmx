<?php

namespace Modules\TripBooking\src\Repositories\Student;

use Modules\TripBooking\src\Repositories\RepositoryInterface;

interface StudentRepositoryInterface extends RepositoryInterface
{
    public function update($request);
    
    public function createApiStudent($response); 
    
    public function export();
    
}